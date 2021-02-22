<section>
    <div class="container">
        <div class="row m-b-20">
            <div class="col-lg-6 p-t-10 m-b-20">
                <h3 class="m-b-20">{{ $shop->head }}</h3>
                <p>{{ $shop->detail }}</p>
            </div>
        </div>

        <!--Product list-->
        <div class="shop">
            <div class="grid-layout grid-{{ $shop->type }}-columns" data-item="grid-item">
                @foreach($product as $value)
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product!" src="{{ $value->picture }}" style="width: 380px; height: 507px; object-fit: cover">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ $value->picture }}" style="width: 380px; height: 507px; object-fit: cover">
                            </a>
                            {{-- <span class="product-new">NEW</span> 
                            <div class="product-overlay">
                                <a href="{{ $value->picture }}" data-lightbox="ajax">Lihat</a>
                            </div>--}}
                        </div>

                        <div class="product-description">
                            <div class="product-category">{{ $value->jenis_product }}</div>
                            <div class="product-title">
                                <h3><a href="#">{{ $value->name }}</a></h3>
                            </div>
                            <div class="product-price"><ins>{{ $value->price }}</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">6 customer reviews</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/2.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/6.jpg') }}">
                            </a>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Women</div>
                            <div class="product-title">
                                <h3><a href="#">Consume Tshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$39.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">3 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/3.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/7.jpg') }}">
                            </a>
                            <span class="product-hot">HOT</span>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Man</div>
                            <div class="product-title">
                                <h3><a href="#">Logo Tshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$39.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">3 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/4.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/9.jpg') }}">
                            </a>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Women</div>
                            <div class="product-title">
                                <h3><a href="#">Cotton Tshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$22.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">5 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/5.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/11.jpg') }}">
                            </a>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Man</div>
                            <div class="product-title">
                                <h3><a href="#">Grey Sweatshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$39.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">5 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/6.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/2.jpg') }}">
                            </a>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Women</div>
                            <div class="product-title">
                                <h3><a href="#">Pocket Tshirt</a></h3>
                            </div>
                            <div class="product-price">
                                <del>$19.00</del><ins>$15.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-reviews"><a href="#">5 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/7.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/3.jpg') }}">
                            </a>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Man</div>
                            <div class="product-title">
                                <h3><a href="#">Dark Tshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$26.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">5 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/8.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/1.jpg') }}">
                            </a>
                            <span class="product-sale">SALE</span>
                            <span class="product-sale-off">50% Off</span>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Women</div>
                            <div class="product-title">
                                <h3><a href="#">Nature Tshirt</a></h3>
                            </div>
                            <div class="product-price">
                                <del>$19.00</del><ins>$15.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">5 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid-item">
                    <div class="product">
                        <div class="product-image">
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/11.jpg') }}">
                            </a>
                            <a href="#"><img alt="Shop product image!" src="{{ asset('frontend/images/shop/products/5.jpg') }}">
                            </a>
                            <span class="product-hot">HOT</span>
                            <span class="product-wishlist">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            </span>
                            <div class="product-overlay">
                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="product-category">Man</div>
                            <div class="product-title">
                                <h3><a href="#">Logo Tshirt</a></h3>
                            </div>
                            <div class="product-price"><ins>$39.00</ins>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-reviews"><a href="#">3 customer reviews</a>
                            </div>
                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
        <!--End: Product list-->

    </div>
</section>