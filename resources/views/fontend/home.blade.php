@extends('fontend.master')
@section('title',' Sản Phẩm')
@section('main')


    <div id="top-banner-and-menu" class="homepage2">
        <div class="container">
            <div class="col-xs-12">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">

                        <div class="item" style="background-image: url(assets/images/sliders/slider02.jpg);">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left right" style="padding-right:0;">
                                    <div class="big-text fadeInDown-1">
                                        Giá Sốc<span class="big"><span class="sign">2tr</span>xx</span>
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                        Tính Năng Vượt Trội<br>
                                       Camera 16Mp<br>
                                        màn hình 8inch
                                    </div>
                                    <div class="small fadeInDown-2">
                                        Sở hữu ngay nào!!!
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="single-product.html" class="big le-button ">Mua Ngay</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                        <div class="item" style="background-image: url(assets/images/sliders/slider04.jpg);">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                    <div class="big-text fadeInDown-1">
                                        Want a<span class="big"><span class="sign">$</span>200</span>Discount?
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                        on desktop pcs
                                    </div>
                                    <div class="small fadeInDown-2">
                                        terms and conditions apply
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="single-product.html" class="big le-button ">shop now</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                    </div><!-- /.owl-carousel -->
                </div>
                <!-- ========================================= SECTION – HERO : END ========================================= -->
            </div>
        </div>
    </div><!-- /.homepage2 -->

    <!-- ========================================= HOME BANNERS ========================================= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="">
                    <div class="banner-text theblue">
                        <h1>Sở hữu</h1>
                        <span class="tagline">Điện thoại mới</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-01.jpg" />
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="">
                    <div class="banner-text right">
                        <h1>Apple Watch</h1>
                        <span class="tagline">Giá rẻ nhất</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-02.jpg" />
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========================================= HOME BANNERS : END ========================================= -->

    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">Sản Phẩm nổi bật</a></li>
                    <li><a href="#new-arrivals" data-toggle="tab">Sản phẩm mới</a></li>
                    <li><a href="#top-sales" data-toggle="tab">top sales</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">
                        <div class="product-grid-holder">
                            @foreach($future as $data)
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon red"><span>sale</span></div>
                                    <div class="image">
                                        <a href="{{ route('detaipro', $data->id) }}"><img alt="" style="height: 173px" src="assets/images/blank.gif" data-echo="{{asset('../storage/app/public/upload/'.$data->pro_img)}}" /></a>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="single-product.html">{{$data->pro_name}}</a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">{{number_format($data->pro_price,0,',','.')}}đ</div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="{{ route('detaipro', $data->id) }}" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="tab-pane" id="new-arrivals">
                        <div class="product-grid-holder">
                            @foreach($new as $newpro)
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon blue"><span>new!</span></div>
                                    <div class="image">
                                        <a href="{{ route('detaipro', $newpro->id) }}"><img alt="" src="assets/images/blank.gif" style="height: 173px" data-echo="{{asset('../storage/app/public/upload/'.$newpro->pro_img)}}" /></a>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="single-product.html">{{$newpro->pro_name}}</a>
                                        </div>
                                        <div class="brand">nokia</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">{{number_format($newpro->pro_price,0,',','.')}}đ</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="{{ route('detaipro', $data->id) }}" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>


                    </div>

                    <div class="tab-pane" id="top-sales">
                        <div class="product-grid-holder">

                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon red"><span>sale</span></div>
                                    <div class="ribbon green"><span>bestseller</span></div>
                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="single-product.html">Netbook Acer TravelMate
                                                B113-E-10072</a>
                                        </div>
                                        <div class="brand">acer</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">

                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-03.jpg" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="single-product.html">POV Action Cam</a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon blue"><span>new!</span></div>
                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-02.jpg" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="single-product.html">White lumia 9001</a>
                                        </div>
                                        <div class="brand">nokia</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon red"><span>sale</span></div>
                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-01.jpg" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                load more products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= BEST SELLERS ========================================= -->

    <section id="bestsellers" class="color-bg wow fadeInUp">
        <div class="container">
            <h1 class="section-title">Apple Watch</h1>

            <div class="product-grid-holder medium">
                <div class="col-xs-12 col-md-7 no-margin">

                    <div class="row no-margin">
                        @foreach($applewatch1 as $data1)
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">

                            <div class="product-item">
                                <div class="image">
                                    <a href="{{ route('detaipro', $data1->id) }}">
                                    <img alt="" src="assets/images/blank.gif" style="height: 153px" data-echo="{{asset('../storage/app/public/upload/'.$data1->pro_img)}}" />
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="{{ route('detaipro', $data1->id) }}">{{$data1->pro_name}}</a>
                                    </div>
                                    <div class="brand">beats</div>
                                </div>
                                <div class="prices">

                                    <div class="price-current text-right">{{number_format($data1->pro_price,0,',','.')}}đ</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{ route('detaipro', $data1->id) }}" class="le-button">Add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                        <a class="btn-add-to-compare" href="#">Compare</a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.product-item-holder -->
                        @endforeach

                    </div><!-- /.row -->

                    <div class="row no-margin">
                        @foreach($applewatch2 as $data)
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class="product-item">
                                <div class="image">
                                    <a href="{{ route('detaipro', $data->id) }}">
                                    <img alt="" src="assets/images/blank.gif" style="height: 153px" data-echo="{{asset('../storage/app/public/upload/'.$data->pro_img)}}" />
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="{{ route('detaipro', $data->id) }}">{{$data->pro_name}}</a>
                                    </div>
                                    <div class="brand">fitbit zip</div>
                                </div>
                                <div class="prices">
                                    <div class="price-current text-right">{{number_format($data->pro_price,0,',','.')}}đ</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{ route('detaipro', $data->id) }}" class="le-button">Add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                        <a class="btn-add-to-compare" href="#">Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                        @endforeach


                    </div><!-- /.row -->
                </div><!-- /.col -->
                <div class="col-xs-12 col-md-5 no-margin">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="{{ route('detaipro', $applewatch3->id) }}">
                                    <img alt="" src="{{asset('../storage/app/public/upload/'.$applewatch3->pro_img)}}" data-echo="{{asset('../storage/app/public/upload/'.$applewatch3->pro_img)}}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                        </div><!-- /.single-product-slider -->

                        <div class="gallery-thumbs clearfix">

                        </div><!-- /.gallery-thumbs -->

                        <div class="body">
                            <div class="label-discount clear"></div>
                            <div class="title">
                                <a href="{{ route('detaipro', $applewatch3->id) }}">{{$applewatch3->pro_name}}</a>
                            </div>
                            <div class="brand">sony</div>
                        </div>
                        <div class="prices text-right">
                            <div class="price-current inline">{{number_format($applewatch3->pro_price,0,',','.')}}đ</div>
                            <a href="{{ route('detaipro', $applewatch3->id) }}" class="le-button big inline">add to cart</a>
                        </div>
                    </div><!-- /.product-item-holder -->
                </div><!-- /.col -->

            </div><!-- /.product-grid-holder -->
        </div><!-- /.container -->
    </section><!-- /#bestsellers -->
    <!-- ========================================= BEST SELLERS : END ========================================= -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->

    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->

    <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >

                <div class="title-nav">
                    <h1>Nhà Tài Trợ</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-brands" class="owl-carousel brands-carousel">

                    <div class="carousel-item">
                        <a href="#">
                            <img alt=""  style="width: 80px" src="assets/images/brands/apple.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt=""  style="width: 125px" src="assets/images/brands/samsung.png" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt=""  style="width: 125px" src="assets/images/brands/oppo.png" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" style="width: 125px" src="assets/images/brands/b.png" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt=""  style="width: 73px" src="assets/images/brands/lg.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt=""  style="width: 125px" src="assets/images/brands/mizz.png" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" style="width: 125px" src="assets/images/brands/vt.png" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-04.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->

    <!-- ============================================================= FOOTER ============================================================= -->

@stop
