<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						fashe@example.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="{{asset('user/images/icons/logo.png')}}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.html">Home</a>
								<ul class="sub_menu">
									<li><a href="index.html">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li>
								</ul>
							</li>

							<li>
								<a href="product.html">Shop</a>
							</li>

							<li class="sale-noti">
								<a href="product.html">Sale</a>
							</li>

							<li>
								<a href="cart.html">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>

							<li>
								
							</li>

							<li>
							<form class="search-product pos-relative bo4 of-hidden" action="{!! route('search') !!}" method="get">
								
									<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search" placeholder="Search Products...">

									<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
										<i class="fs-12 fa fa-search" aria-hidden="true"></i>
									</button>
								
								</form>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					@guest

					<div class="header-wrapicon2">
						<img src="{{asset('user/images/icons/icon-header-01.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<div class="header-cart-buttons">
								

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('login') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Login
									</a>
								</div>
							
								

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('register') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Sign up
									</a>
								</div>
							</div>
						</div>
					</div>

					@else

					<div class="header-wrapicon2">
						<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="{{route('user.profile')}}" class="header-cart-item-name">
											User Profile
										</a>
									</div>
								</li>
							</ul>

							<div class="header-cart-buttons">
								

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('logout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
										Log out
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              						@csrf
            						</form>
								</div>
							</div>
						</div>
					</div>

					@endguest

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{{asset('user/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti" id="totalItems">{{ App\Models\Cart::totalItems() }}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							@if (App\Models\Cart::totalItems() > 0)
								@php
          							$total_price = 0;
          						@endphp
          					@foreach (App\Models\Cart::totalCarts() as $cart)
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										@if ($cart->product->images->count() > 0)
                  							<img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                						@endif
									</div>

									<div class="header-cart-item-txt">
										<a href="{{ route('products.details', $cart->product->slug) }}">{{ $cart->product->title }}</a>

										<span class="header-cart-item-info">
											{{ $cart->product_quantity }} x {{ $cart->product->price }} Tk
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								@php
                					$total_price += $cart->product->price * $cart->product_quantity;
                					@endphp

                					{{ $cart->product->price * $cart->product_quantity }} Tk
							</div>
							@endforeach

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('carts') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
							@else
      						<div class="alert alert-warning">
        						<strong>There is no item in your cart.</strong>
        						<br>
        						<a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
      						</div>
    						@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="{{asset('user/images/icons/logo.png')}}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="{{asset('user/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{asset('user/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{asset('user/images/item-cart-01.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{asset('user/images/item-cart-02.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{asset('user/images/item-cart-03.jpg')}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>