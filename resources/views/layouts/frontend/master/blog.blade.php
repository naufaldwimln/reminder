<section class="content background-grey">
		<div class="container">
				<div class="heading-text heading-section">
						<h2>{{ @$artikel->head ?? 'OUR BLOG' }}</h2>
						<span class="lead">{{ @$artikel->detail  }}</span>
				</div>
				<div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
					@foreach ($artikel_detail as $row)
						<!-- Post item-->
						<div class="post-item border">
								<div class="post-item-wrap">
										<div class="post-image">
												<a href="#">
														<img alt="" src="{{ $row->picture }}">
												</a>
												{{-- <span class="post-meta-category"><a href="">Lifestyle</a></span> --}}
										</div>
										<div class="post-item-description">
												<span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
												{{-- <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
																Comments</a></span> --}}
												<h2><a href="#"> {{ $row->head }}
														</a></h2>
												<p>{{ $row->detail }}</p>

												<a href="#" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

										</div>
								</div>
						</div>
						<!-- end: Post item-->
					@endforeach
				</div>
		</div>
</section>