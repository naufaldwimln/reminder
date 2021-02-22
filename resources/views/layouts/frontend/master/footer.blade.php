<footer id="footer">
	<div class="footer-content">
		<div class="container">
			<div class="row">
					<div class="col-lg-5">
							<div class="widget">
									<div class="widget-title">{{ @$general_app->name ?? 'Mitra Pedagang' }}</div>
									<p class="mb-5">{{ @$general_app->address ?? 'Jl. Medan Merdeka Utara No. 7, Jakarta Pusat.' }}</p>
							</div>
					</div>
					<div class="col-lg-7">
							<div class="row">
									<div class="col-lg-3">
											<div class="widget">
													<ul class="list">
															<li><a href="#">Contact</a></li>
													</ul>
													<div class="align-center">
															<a class="btn btn-xs btn-slide btn-light" href="#">
																	<i class="fab fa-facebook-f"></i>
																	<span>{{ @$general_app->facebook ?? 'Facebook' }}</span>
															</a>
															<a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
																	<i class="fab fa-twitter"></i>
																	<span>{{ @$general_app->twitter ?? 'Twitter' }}</span>
															</a>
															<a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
																	<i class="fab fa-instagram"></i>
																	<span>{{ @$general_app->instagram ?? 'Instagram' }}</span>
															</a>
															<a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
																	<i class="far fa-envelope"></i>
																	<span>{{ @$general_app->email ?? 'Mail' }}</span>
															</a>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>
	</div>
	<div class="copyright-content">
		<div class="container">
			<div class="copyright-text text-center">&copy; @php 
							echo date('Y'); 
					@endphp <a href="#"> {{ @$general_app->name ?? 'Mitra Pedagang' }} </a> | 
					All Rights Reserved.</div>
		</div>
	</div>
</footer>