@extends('layouts.backend.master')

@section('content')

<div class="col-md-12">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
    <div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title"><i class="icon-list2"></i> @php 
				echo getDetailMenu()->nama_menu 
				@endphp
			</h5>
			<div class="header-elements">
				<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button>
			</div>
		</div>
		<legend></legend>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped ">
					<thead>
						<tr>
							<th>Head</th>
							<th>Detail</th>
							<th>Status</th>
							<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@if ($data->count() == 0)
						<tr>
							<td colspan="9" class="text-center" style="color:red">Tidak ada data</td>
						</tr>
						@else
						@foreach ($data as $value)
						<tr>
							<td>{{ $value->head }}</td>
							<td>{{ $value->detail }}</td>
							<td>{{ $value->status == '1' ? 'ON' : 'OFF' }}</td>
							<td class="text-center">
								
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route('working-detail.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('working-detail.destroy', $value->id) }}" method="POST" style="display: none;">
		                        		{{ method_field('DELETE') }}
		                                @csrf
		                        </form>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h6 class="modal-title">TAMBAH</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('working-detail.store') }}" method="POST" id="formData" class="form-validate-jquery">
				<div class="modal-body">
				   	@csrf

					<div class="form-group">
						<label>Head</label>
						<input type="text" name="head" id="head" class="form-control" required placeholder="Head">
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Detail:</label>
						<div class="col-lg-12">
							<textarea rows="5" cols="5" class="form-control" name="detail" id="detail" placeholder="Detail"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="">Status </label>
						<select name="status" id="status" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn bg-info btn-action" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$(document).ready(function(){
		$(".btn-class").click(function() {
		});
	});

	$("textarea").on('change paste keyup', function () {
	    var currText = $(this).val();
	    if (currText.length > 150) {
	        var text = $(this).text();
	        $(this).text(text.substr(0, 150));
	        alert("You have reached the maximum length for this field");
	    }
	});

	function addUser(){
		var red = "{{ route('working-detail.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('working-detail.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route('working-detail.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE')
				$('.btn-action').text('Update')
				$('#head').val(response.head);
				$('#detail').val(response.detail);
				$('#status').val(response.status);
			}
		})
	}

	function deleteMenu(id){
		var tanya = 'Apakah anda yakin?';
		if (confirm(tanya)) {
			$('#submitDelete'+id).click();
		}
	}
</script>
@stop
