<section>
	<div class="container">
		<div class="heading-text heading-section text-center">
			<h2>{{ @$service->head ?? 'SERVICES' }}</h2>
			<p>{{ @$service->detail ?? 'Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.' }}</p>
		</div>

		<div class="row">
			@foreach($service_detail as $row)
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa {{ $row->icon }}"></i></a>
							</div>
							<h3>{{ $row->head }}</h3>
							<p>{{ $row->detail }}</p>
					</div>
			</div>
			@endforeach

			@if(count($service_detail) == 0)
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-desktop"></i></a>
							</div>
							<h3>Flexible Layouts</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="400">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-cloud"></i></a>
							</div>
							<h3>Retina Ready</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>

			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="far fa-lightbulb"></i></a>
							</div>
							<h3>Fast processing</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="800">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-trophy"></i></a>
							</div>
							<h3>Unlimited Colors</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1000">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-thumbs-up"></i></a>
							</div>
							<h3>Premium Sliders</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>

			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1200">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-rocket"></i></a>
							</div>
							<h3>Modern Design</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1400">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-flask"></i></a>
							</div>
							<h3>Clean Modern Code</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1600">
					<div class="icon-box effect medium border small">
							<div class="icon">
									<a href="#"><i class="fa fa-umbrella"></i></a>
							</div>
							<h3>Free Updates & Support</h3>
							<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor
									cursumus.</p>
					</div>
			</div>
			@endif
		</div>
	</div>
</section>