<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>{{ @$work->head ?? 'WHAT WE DO' }}</h2>
			<span class="lead">{{ @$work->detail ?? 'Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.' }}</span>
		</div>
		<div class="row">
			@foreach($work_detail as $row)
				@if($row->status == '1')
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="0">
								<h4>{{ $row->head }}</h4>
								<p>{{ $row->detail }}</p>
						</div>
				</div>
				@endif
			@endforeach

			@if(count($work_detail) == 0) 
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="200">
								<h4>Loaded with Features</h4>
								<p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
										Quisque euismod orci ut et lobortis aliquam.</p>
						</div>
				</div>
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="400">
								<h4>Completely Customizable</h4>
								<p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
										Quisque euismod orci ut et lobortis aliquam.</p>
						</div>
				</div>
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="600">
								<h4>100% Responsive Layout</h4>
								<p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
										Quisque euismod orci ut et lobortis aliquam.</p>
						</div>
				</div>
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="800">
								<h4>Clean Modern Code</h4>
								<p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
										Quisque euismod orci ut et lobortis aliquam.</p>
						</div>
				</div>
				<div class="col-lg-4">
						<div data-animate="fadeInUp" data-animate-delay="1000">
								<h4>Free Updates & Support</h4>
								<p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
										Quisque euismod orci ut et lobortis aliquam.</p>
						</div>
				</div>
			@endif
			
		</div>
	</div>
</section>