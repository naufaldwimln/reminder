<section class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>{{ @$portofolio->head }}</h2>
			<span class="lead">{{ @$portofolio->detail }}</span>
		</div>
	</div>
	<div class="portfolio">
		<!-- Portfolio Items -->
		<div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
			@foreach($portofolio_detail as $row)
				<!-- portfolio item -->
				@if($row->status == '1')
				<div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
					<div class="portfolio-item-wrap">
						<div class="portfolio-image">
							<a href="#"><img src="{{ $row->picture }}" style="height: 250px; object-fit: cover;" alt=""></a>
						</div>
						<div class="portfolio-description">
							<a title="Zoom" data-lightbox="image" href="{{ $row->picture }}"><i class="fa fa-expand"></i></a>
						</div>
					</div>
				</div>
				@endif
				<!-- end: portfolio item -->
			@endforeach
		</div>
		<!-- end: Portfolio Items -->
	</div>
</section>