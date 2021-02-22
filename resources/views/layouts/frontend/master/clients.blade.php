<section class="p-t-60">
		<div class="container">
				<div class="heading-text heading-section text-center">
						<h2>CLIENTS</h2>
						<span class="lead"></span>
				</div>
			<div class="carousel" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2"
					data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay-timeout="3000"
					data-loop="true">
					@foreach($client as $value)
					<div>
						<a href="#"><img alt="" src="{{ $value->picture }}"> </a>
					</div>
					@endforeach
			</div>
		</div>
</section>