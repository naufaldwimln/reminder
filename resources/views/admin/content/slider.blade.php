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
							<th>Picture</th>
							<th>Status</th>
							<th>Link</th>
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
							<td><img src="{{ $value->picture }}" style="width: 100%; height: 75px;" class="img-rounded"></td>
							<td>{{ $value->status }}</td>
							<td>{{ $value->link }}</td>
							<td class="text-center">
								
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route('slider.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('slider.destroy', $value->id) }}" method="POST" style="display: none;">
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
				<h6 class="modal-title">TAMBAH SLIDER</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('slider.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
				<div class="modal-body">
				   	@csrf

					<div class="form-group">
						<label>Head</label>
						<input type="text" name="head" id="head" class="form-control" required placeholder="Head">
					</div>

					<div class="form-group">
						<label>Detail</label>
						<input type="text" name="detail" id="detail" class="form-control" required placeholder="Detail">
					</div>

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
							<option value="on">ON</option>
							<option value="off">OFF</option>
						</select>
					</div>

					<div class="form-group">
						<label>Link</label>
						<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
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
		var red = "{{ route('slider.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH SLIDER');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('slider.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route('slider.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE SLIDER')
				$('.btn-action').text('Update')
				$('#head').val(response.head);
				$('#detail').val(response.detail);
				$('#status').val(response.status);
				$('#link').val(response.link);
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
