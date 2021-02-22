<section id="welcome" class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
			<h2>{{ @$header->head ?? 'Selamat datang di web Mitra Pedagang'}}</h2>
			<span class="lead">{{ @$header->detail ?? 'Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.' }}</span>
		</div>
		<div class="row" data-animate="fadeInUp">
			<div class="col-lg-12">
				<img class="img-fluid" src="{{ @$header->picture ?? 'frontend/images/other/responsive-1.jpg' }}" alt="Welcome">
			</div>
		</div>
	</div>
</section>