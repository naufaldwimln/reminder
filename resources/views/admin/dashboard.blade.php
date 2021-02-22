@extends('layouts.backend.master')

@section('content')

<div class="col-md-12">
	<div class="card">
		<div class="card-body py-0">
			{{-- <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">Lenkapi data</div>
                    </div>
								</div> --}}

			{{-- token anda : {{ $data->api_token }} --}}
		</div>

		<div class="col-sm-8">
			<div class="card">
				<div class="card-body">
					
					<h5 class="card-title"># PETUNJUK PENGGUNAAN SERVICE API eSIGN</h5>
					<p class="card-text">

					Klik pada menu <a href="{{ url('admin/developer') }}">Developer</a> untuk mendapatkan Token API, <br>

					Pilih Menu Personal Access Token, dan clik <a href="#">Create new token</a> untuk membuat token<br>
					
					
					
					token hanya bisa di lihat sekali, apabila anda lupa dengan token, anda bisa menambahkan token lagi dan menghapus token yang lama agar tidak menjadi data spam

					</p>
					<p class="card-text">
						<em><small>Note: Token ini digunakan untuk request API Data Client</small></em>
					</p>

					<br>
					<h5 class="card-title"># DOWNLOAD DOKUMENTASI API</h5>
					<p class="card-text">
					Download Dokumentasi API <a href="" target="_blank" download> Disini</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('script')

@stop