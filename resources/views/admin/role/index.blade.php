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
				<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addRole()"><b><i class="icon-plus3"></i></b> Tambah</button>
			</div>
		</div>
		<legend></legend>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped ">
					<thead>
						<tr>
							<th>Role</th>
							<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@if ($role->count() == 0)
						<tr>
							<td colspan="3" class="text-center" style="color:red">Tidak ada data</td>
						</tr>
						@else
						@foreach ($role as $value)
						<tr>
							<td>{{ @$value->nama_user_group }}</td>
							<td class="text-center">
								<a href="{{ route('grupmenu.index', $value->id) }}" class="btn bg-success rounded-round" title="Edit Role"><i class="icon-user-check"></i></a>

								<a href="#" class="btn bg-primary rounded-round" title="Edit" onclick="getEditRole({{ $value->id }})"><i class="icon-pen-plus"></i></a>

								<a href="#" class="btn bg-danger rounded-round" href="{{ route('roles.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $value->id }}').submit();"> <i class=" icon-trash"></i></a>
		                        <form id="destroy-form-{{ $value->id }}" action="{{ route('roles.destroy', $value->id) }}" method="POST" style="display: none;">
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
				<h6 class="modal-title">TAMBAH ROLE</h6>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form action="{{ route('roles.store') }}" method="POST" id="formData" class="form-validate-jquery">
				<div class="modal-body">
				   	@csrf
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_user_group" id="nama_user_group" class="form-control" required placeholder="Nama Role">
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

	function addRole(){
		var red = "{{ route('roles.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('TAMBAH ROLE');
		$('.btn-action').text('Simpan');	
		// form	
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);
		$('[name="_method"]').remove();
	}


	function getEditRole(id) {
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		var url = "{{ route('roles.show', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
		var red = "{{ route('roles.update.fix', ['id' => 'idMenu']) }}".replace("idMenu", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response) {
				console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').append('{{ method_field('PATCH') }}');
				$('#formData').attr('action', red);
				// $('#formData').attr('method', 'PATCH');
				$('.modal-title').text('UPDATE ROLE')
				$('.btn-action').text('Update')
				$('#nama_user_group').val(response.nama_user_group);
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
