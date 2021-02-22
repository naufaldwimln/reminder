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
							<th>Nama</th>
							<th>Email</th>
							<th>Role</th>
							<th>Update</th>
							<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@if ($users->count() == 0)
						<tr>
							<td colspan="9" class="text-center" style="color:red">Tidak ada data</td>
						</tr>
						@else
						@foreach ($users as $value)
						<tr>
							<td>{{ $value->name }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->nama_user_group }}</td>
							<td>{{ @$value->updated_at }}</td>
							<td class="text-center">
								
								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditMenu({{ $value->id }})"><i class="icon-pen-plus"></i></a>
								<a href="#" class="btn bg-danger rounded-round" href="{{ route('users.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('users.destroy', $value->id) }}" method="POST" style="display: none;">
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
				<h6 class="modal-title">TAMBAH USER</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('users.store') }}" method="POST" id="formData" class="form-validate-jquery">
				<div class="modal-body">
				   	@csrf

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" id="email" class="form-control" required placeholder="Email">
					</div>

					<div class="form-group">
						<label class="">Role</label>
						<select name="role" id="role" class="form-control" required placeholder="Pilih">
							<option value="" disabled selected>Pilih</option>
							@foreach($roles as $parrent)
								<option value="{{ $parrent->id }}">{{ $parrent->nama_user_group }}</option>
							@endforeach
						</select>
					</div>

					<div class="target-password"></div>
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

	});

	function addUser(){
		var red = "{{ route('users.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.modal-title').text('TAMBAH USER');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
		$('.target-password').html('<div class="form-group form-password"><label>Password</label><input type="password" name="password" id="password" class="form-control" required placeholder="Password"></div>');
	}


	function getEditMenu(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('users.show', ['id' => 'idEdit']) }}".replace("idEdit", id);
		var red = "{{ route('users.update.fix', ['id' => 'idUser']) }}".replace("idUser", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				$('.form-password').remove();
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE MENU')
				$('.btn-action').text('Update')
				$('#nama').val(response.name);
				$('#email').val(response.email);
				$('#role').val(response.id_user_group);
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
