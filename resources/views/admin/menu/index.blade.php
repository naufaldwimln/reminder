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
							<th>Menu</th>
							<th>Link</th>
							<th>Icon</th>
							<th>Urutan</th>
							<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@if ($menus->count() == 0)
						<tr>
							<td colspan="9" class="text-center" style="color:red">Tidak ada data</td>
						</tr>
						@else
						@foreach ($menus as $value)
						<tr>
							<td>{{ $value->nama_menu }}</td>
							<td>{{ $value->link }}</td>
							<td>{{ $value->icon_menu }}</td>
							<td>{{ @$value->urutan }}</td>
							<td class="text-center">
								
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route('menus.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('menus.destroy', $value->id) }}" method="POST" style="display: none;">
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
				<h6 class="modal-title">TAMBAH MENU</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('menus.store') }}" method="POST" id="formData" class="form-validate-jquery">
				<div class="modal-body">
				   	@csrf

					<div class="form-group">
						<label>Nama menu</label>
						<input type="text" name="nama_menu" id="nama_menu" class="form-control" required placeholder="Nama menu">
					</div>

					<div class="form-group">
						<label class="">Parent </label>
						<select name="parrent" id="parrent" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							<option value="0">Tidak ada parrent</option>
							@foreach($parrents as $parrent)
								<option value="{{ $parrent->id }}">{{ $parrent->nama_menu }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Link</label>
						<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
					</div>
					<div class="form-group">
						<label>Icon Menu <span>  / <a target="_blank" href="https://icomoon.io/#preview-free"> Referensi icon</a></span></label>
						<input type="text" name="icon_menu" id="icon_menu" class="form-control" required placeholder="Icon Menu">
					</div>

					<div class="form-group">
						<label>Urutan</label>
						<input type="number" name="urutan" id="urutan" class="form-control" required placeholder="Urutan Menu">
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
		$(".btn-class").click(function(){
		 	console.log('test')
		});
	});

	function addUser(){
		var red = "{{ route('menus.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH MENU');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('menus.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route('menus.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE MENU')
				$('.btn-action').text('Update')
				$('#nama_menu').val(response.nama_menu);
				$('#id_parrent').val(response.parrent);
				$('#parrent').val(response.nama_parrent);
				$('#link').val(response.link);
				$('#icon_menu').val(response.icon_menu);
				$('#urutan').val(response.urutan);
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
