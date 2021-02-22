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
							<th>Picture</th>
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
							<td><img src="{{ $value->picture }}" style="width: 50px; height: 50px;" class="img-rounded"></td>
							<td>{{ $value->status == '1' ? 'ON' : 'OFF' }}</td>
							<td class="text-center">
								
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route(request()->segment(2).'.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route(request()->segment(2).'.destroy', $value->id) }}" method="POST" style="display: none;">
		                        		{{ method_field('DELETE') }}
		                                @csrf
		                        </form>
							</td>
						</tr>
						@endforeach
						@endif
						<tr>
							<td colspan="9">
								{{ $data->links() }}

							</td>
						</tr>
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

			<form action="{{ route(request()->segment(2).'.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
				<div class="modal-body">
				   	@csrf

					<div class="form-group">
						<label class="col-lg-3 control-label">Picture:</label>
						<div class="col-lg-12">
							<div class="media no-margin-top">
								<div class="media-left">
									<a href="#"><img src="" style="width: 58px; height: 58px;" id="target_image" class="img-rounded" alt=""></a>
								</div>

								<div class="media-body">
									<input type="file" class="file-styled" name="picture">
									<span class="help-block">Accepted formats: jpg. Max file size 2Mb. Usahakan file sekecil mungkin dan jelas. <br>Rekomended agar gambar pas ukuran 1920 x 1280 </span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="">Status </label>
						<select name="status" id="status" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							<option value="0">OFF</option>
							<option value="1">ON</option>
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

	function addUser(){
		var red = "{{ route(request()->segment(2).'.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH CLIENT');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route(request()->segment(2).'.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route(request()->segment(2).'.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

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
				$('#status').val(response.status);
				$('#target_image').attr('src', response.picture);
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
