<div id="slider" class="inspiro-slider slider-fullscreen arrows-large arrows-creative dots-creative">
	@foreach($slider as $row)
	<!-- Slide 1 -->
	<div class="slide background-overlay-gradient kenburns background-image" style="background-image:url( {{ $row->picture }} );">
		<div class="container">
			<div class="slide-captions text-center text-light">
				<!-- Captions -->
				<h1>{{ $row->head }}</h1>
				<p>{{ $row->detail }}</p>
				<a href="{{ $row->link ?? '#' }}" class="btn scroll-to">Explore</a>
				<!-- end: Captions -->
			</div>
		</div>
	</div>
	@endforeach
	<!-- end: Slide 1 -->
	@if(count($slider) == 0)
	<!-- Slide 2 -->
	<div class="slide background-overlay-gradient kenburns background-image" style="background-image:url('frontend/images/slider/pattern.png');">
		<div class="container">
			<div class="slide-captions text-left text-light">
				<!-- Captions -->
				<h1>200+ Layout Demos</h1>
				<p class="text-small">Mitra Pedagang is packed with 200+ pre-made layouts that allow you to quickly jumpstart your project. Completely customizable for creating your own designs.</p>
				<a href="#welcome" class="btn scroll-to">Explore</a>
						<!-- end: Captions -->
			</div>
		</div>
	</div>
	@endif
	<!-- end: Slide 2 -->
</div>