<header id="header" data-transparent="true" class="dark">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="index.html" class="logo" data-src-dark="{{ @$general_app->logo_light ?? 'frontend/images/logo-dark.png' }}">
                    <img src="{{ @$general_app->logo_dark ?? 'frontend/images/logo_dark.png' }}" alt="Logo">
                </a>
            </div>
            <!--End: Logo-->

            <!-- Search -->
            <div id="search">
                <div id="search-logo"><img src="{{ @$general_app->logo_dark ?? 'frontend/images/logo.png' }}" alt="Logo"></div>
                <button id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i
                        class="icon-x"></i></button>
                <form class="search-form" action="" method="get">
                    <input class="form-control" name="q" type="search" placeholder="Search..."
                        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                    <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                </form>

                {{-- <div class="search-suggestion-wrapper">
                    <div class="search-suggestion">
                        <h3>News Articles</h3>
                        <p><a href="#">Beautiful nature, and rare feathers!</a></p>
                        <p><a href="#">New costs and rise of the economy!</a></p>
                        <p><a href="#">A true story, that never been told!</a></p>
                    </div>
                    <div class="search-suggestion">
                        <h3>Looking for these?</h3>
                        <p><a href="#">New costs and rise of the economy!</a></p>
                        <p><a href="#">AI can be trusted to take answer calls </a></p>
                        <p><a href="#">Mitra Pedagang now lets you easily create any beautiful clean website</a></p>
                    </div>
                    <div class="search-suggestion">
                        <h3>Blog Posts</h3>
                        <p><a href="#">A true story, that never been told!</a></p>
                        <p><a href="#">Beautiful nature, and rare feathers!</a></p>
                        <p><a href="#">The most happiest time of the day!</a></p>
                    </div>
                </div> --}}
            </div>
            <!-- end: search -->

            <!--Header Extras-->
            <div class="header-extras">
                <ul>
                    <li>
                        <!--search icon-->
                        <a id="btn-search" href="#"> <i class="icon-search1"></i></a>
                        <!--end: search icon-->
                    </li>
                    <li class="d-none d-sm-block">
                        <!--shopping cart-->
                        <div id="shopping-cart" class="p-dropdown">
                            <a href="shop-cart.html"><span class="shopping-cart-items">8</span><i
                                    class="icon-shopping-cart1"></i></a>
                            <div class="p-dropdown-content ">
                                <div class="widget-mycart">
                                    <h4>My Cart</h4>
                                    <div class="cart-item">
                                        <div class="cart-image"> <a href="#"><img
                                                    src="images/shop/products/10.jpg"></a></div>
                                        <div class="cart-product-meta">
                                            <a href="#">Bolt Sweatshirt</a>
                                            <span>3 x 28$</span>
                                        </div>
                                        <div class="cart-item-remove">
                                            <a href="#"><i class="icon-x"></i></a></div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="cart-image"> <a href="#"><img
                                                    src="images/shop/products/11.jpg"></a></div>
                                        <div class="cart-product-meta">
                                            <a href="#">Yellow Sweatshirt</a>
                                            <span>1 x 18$</span>
                                        </div>
                                        <div class="cart-item-remove">
                                            <a href="#"><i class="icon-x"></i></a></div>
                                    </div>
                                    <hr>
                                    <div class="cart-total">
                                        <div class="cart-total-labels">
                                            <span>Subtotal</span>
                                            <span>Taxes</span>
                                            <span><strong>Total</strong></span>
                                        </div>
                                        <div class="cart-total-prices">
                                            <span>320$</span>
                                            <span>8%</span>
                                            <span><strong>385$</strong></span>
                                        </div>

                                    </div>
                                    <div class="cart-buttons text-right">
                                        <button class="btn btn-xs">Checkout</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: shopping cart-->
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->

            <!--Navigation-->
            <div id="mainMenu" class="menu-uppercase">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html">Tentang</a></li>
                            <li><a href="index.html">Product</a></li>
                            <li><a href="index.html">Blog</a></li>
                            <li><a href="index.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>