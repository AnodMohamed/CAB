<main id="main" style="padding: 100px 0px;">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="assets/images/multiple_subjects_textbooks_stock_photo_Slide01.jpg" alt="" class="img-slide">
                    {{-------
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                        <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                        <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                    --------}}
                </div>
                <div class="item-slide">
                    <img src="assets/images/Discussion.png" alt="" class="img-slide">
                    {{-------

                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                    --------}}
                </div>
                <div class="item-slide">
                    <img src="assets/images/slide2.jpg" alt="" class="img-slide">
                    {{-------
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                -----------}}
                </div>
            </div>
        </div>

         	

        @php
            $profiles = DB::table('profiles')->count();
        @endphp
        <!--On Sale-->
        @if( $profiles > 0 )

            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">Experts </h3>
                <div class="wrap-countdown mercado-countdown" ></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"3"}}'>


                    @foreach ($experts as $expert)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('storage/profile-photos/default-avatar.png') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    @php
                                        $category = DB::table('categories')->where('id',$expert->profile->category_id)->first();
                                    @endphp
                                    <span class="flash-item sale-label">{{$category->name}}</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('viewprofile',['user_id'=>$expert->id]) }}" class="product-name"><span>{{$expert->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$expert->profile->price}}</span></div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

        @endif

      
   	

    </div>

</main>