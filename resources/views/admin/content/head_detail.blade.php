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
			<form action="{{ route(request()->segment(2).'.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="col-lg-3 control-label">Head:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="head" placeholder="Head" value="{{ $data->head }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Detail:</label>
					<div class="col-lg-12">
						<input type="text" class="form-control" name="detail" placeholder="Detail" value="{{ $data->detail }}">
					</div>
				</div>

				@if (request()->segment(2) == 'shop')
				<div class="form-group">
					<label class="col-lg-3 control-label">Tampilan:</label>
					<div class="col-lg-9">
						<select class="select" class="form-control" name="type">
							<option value="" disabled="">Silahkan Pilih</option>
							<option value="3" {{ $data->type == '3' ? 'selected' : '' }}>3 Top</option>
							<option value="4" {{ $data->type == '4' ? 'selected' : '' }}>4 Top</option>
							<option value="6" {{ $data->type == '6' ? 'selected' : '' }}>6 Top</option>
							<option value="12" {{ $data->type == '12' ? 'selected' : '' }}>12 Top</option>
						</select>
					</div>
				</div>
				@endif

				@if (request()->segment(2) == 'header')

				<div class="form-group">
					<label class="col-lg-3 control-label">Picture:</label>
					<div class="col-lg-12">
						<div class="media no-margin-top">
							<div class="media-left">
								<a href="#"><img src="{{ $data->picture }}" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
							</div>

							<div class="media-body">
								<input type="file" class="file-styled" name="picture">
								<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb. Usahakan file sekecil mungkin dan jelas</span>
							</div>
						</div>
					</div>
				</div>

				@endif

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
