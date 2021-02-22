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
				{{-- <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button> --}}
			</div>
		</div>
		<legend></legend>
		<div class="card-body">
			<form action="{{ route('setting-application.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Aplikasi:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="name_application" placeholder="Nama Aplikasi" value="{{ $data->name }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Logo Cerah:</label>
					<div class="col-lg-12">
						<div class="media no-margin-top">
							<div class="media-left">
								<a href="#"><img src="{{ $data->logo_light }}" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
							</div>

							<div class="media-body">
								<input type="file" class="file-styled" name="logo_ligth">
								<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb. Usahakan file sekecil mungkin dan jelas</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Logo Gelap:</label>
					<div class="col-lg-12">
						<div class="media no-margin-top">
							<div class="media-left">
								<a href="#"><img src="{{ $data->logo_dark }}" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
							</div>

							<div class="media-body">
								<input type="file" class="file-styled" name="logo_dark">
								<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb. Usahakan file sekecil mungkin dan jelas</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Logo Icon:</label>
					<div class="col-lg-12">
						<div class="media no-margin-top">
							<div class="media-left">
								<a href="#"><img src="{{ $data->icon }}" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
							</div>

							<div class="media-body">
								<input type="file" class="file-styled" name="icon">
								<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb. Usahakan file sekecil mungkin dan jelas</span>
							</div>
						</div>
					</div>
				</div>

				<hr>

				<div class="form-group">
					<label class="col-lg-3 control-label">Facebook:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{ $data->facebook }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Instagram:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{ $data->instagram }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Twitter:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{ $data->twitter }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="email" placeholder="Email" value="{{ $data->email }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Phone:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $data->phone }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Alamat:</label>
					<div class="col-lg-12">
						<textarea rows="5" cols="5" class="form-control" name="address" placeholder="Alamat">{{ $data->address }}</textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-12">
						<button type="submit" style="width: 100%" class="btn btn-success">Simpan <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$(document).ready(function() {

	});

</script>
@stop
