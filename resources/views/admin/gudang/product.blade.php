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
							<th>Pictrue</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Status</th>
							<th>Promo</th>
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
							<td><img src="{{ $value->picture }}" style="width: 75px; height: 75px; object-fit: cover;" class="img-rounded"></td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->unit }}</td>
							<td>{{ $value->price }}</td>
							<td>{{ $value->stock }}</td>
							<td>{{ $value->status == '1' ? 'ON' : 'OFF' }}</td>
							<td>{{ $value->Promo }}</td>
							<td class="text-center">
								<a href="{{ route('product.edit', $value->id) }}" class="btn bg-success rounded-round" title="Add Picture"><i class="icon-images3"></i></a>
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route('product.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('product.destroy', $value->id) }}" method="POST" style="display: none;">
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
				<h6 class="modal-title">TAMBAH product</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('product.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
				<div class="modal-body">
				   	@csrf

				   	<div class="form-group">
						<label class="">Jenis Product </label>
						<select name="jenis" id="jenis" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							@foreach($jenis_product as $value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="name" class="form-control" required placeholder="Name">
					</div>

					<div class="form-group">
						<label>Unit/Satuan</label>
						<input type="text" name="unit" id="unit" class="form-control" required placeholder="Unit/Satuan">
					</div>

					<div class="form-group">
						<label>Price</label>
						<input type="number" name="price" id="price" class="form-control" required placeholder="Price">
					</div>

					<div class="form-group">
						<label>Stock</label>
						<input type="number" name="stock" id="stock" class="form-control" required placeholder="Stock">
					</div>

					<div class="form-group">
						<label class="">Status </label>
						<select name="status" id="status" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
					</div>

					<div class="form-group">
						<label class="">Promo </label>
						<input type="number" name="promo" id="promo" class="form-control" placeholder="Promo">
					</div>

					<div class="form-group">
						<label>Size</label>
						<input type="text" name="size" id="size" class="form-control" placeholder="Size">
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Detail:</label>
						<div class="col-lg-12">
							<textarea rows="5" cols="5" class="form-control" name="detail" id="detail" placeholder="Detail"></textarea>
						</div>
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
		var red = "{{ route('product.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH PRODUCT');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('product.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route('product.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE PRODUCT');
				$('.btn-action').text('Update');
				$('#jenis').val(response.id_jenis_product);
				$('#name').val(response.name);
				$('#detail').text(response.detail);
				$('#unit').val(response.unit);
				$('#price').val(response.price);
				$('#stock').val(response.stock);
				$('#status').val(response.status);
				$('#promo').val(response.promo);
				$('#size').val(response.size);
				$('#picture').val(response.picture);
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
