@extends('fontend.master')
@section('title',' Sản Phẩm')
@section('main')
    <section id="category-grid">
        <div class="container">
            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
                <!-- ========================================= PRODUCT FILTER ========================================= -->

                <!-- ========================================= PRODUCT FILTER : END ========================================= -->

                <!-- ========================================= CATEGORY TREE ========================================= -->
                <div class="widget" style="margin-top: 20px">
                    <legend>Hãng Sản phẩm</legend>
                    <div class="body">
                        <ul class="le-links">
                            @foreach($category as $cate)
                                <li><a href="{{route('detaicate',$cate->id)}}">{{$cate->cate_name}}</a></li>
                            @endforeach
                        </ul><!-- /.le-links -->
                    </div>
                </div>
                <!-- ========================================= CATEGORY TREE : END ========================================= -->

                <!-- ========================================= LINKS ========================================= -->

                <!-- ========================================= LINKS : END ========================================= -->

                <div class="widget">
                    <div class="simple-banner">
                        <a ><img alt="" class="img-responsive" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-simple.jpg" /></a>
                    </div>
                </div>

                <!-- ========================================= FEATURED PRODUCTS ========================================= -->

                <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->

            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
                <div id="grid-page-banner">
                    <a >
                        <img src="assets/images/banners/banner-gamer.jpg" alt="" />
                    </a>
                </div>

                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">Hãng {{$catename->cate_name}} </h2>

                        <div class="control-bar">
{{--                            <div id="popularity-sort" >--}}
{{--                                <select data-placeholder="sort by popularity">--}}
{{--                                    <option value="1">1-100 sản phẩm</option>--}}

{{--                                </select>--}}
{{--                            </div>--}}



                            <div class="grid-list-buttons">
                                <ul>
                                    <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Lưới</a></li>
                                    <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> Chi tiết</a></li>
                                </ul>
                            </div>
                        </div><!-- /.control-bar -->

                        <div class="tab-content">
                            <div id="grid-view" class="products-grid fade tab-pane in active">

                                <div class="product-grid-holder">
                                    <div class="row no-margin">
                                        @foreach($category3 as $catepro)
                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" class="img-responsive" style="height: 153px" data-echo="{{asset('../storage/app/public/upload/'.$catepro->pro_img)}}" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">{{$catepro->sale}}% sale</div>
                                                    <div class="title">
                                                        <a href="{{ route('detaipro', $catepro->id) }}">{{$catepro->pro_name}}</a>
                                                    </div>

                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">{{number_format(3450000,0,',','.')}}đ</div>
                                                    <div class="price-current pull-right">{{number_format($catepro->pro_price,0,',','.')}}đ</div>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="add-cart-button">
                                                        <a href="{{route('addcart' , $catepro->id) }}" class="le-button">Thêm vào giỏ</a>
                                                    </div>

                                                </div>
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->
                                        @endforeach


                                    </div><!-- /.row -->
                                </div><!-- /.product-grid-holder -->

                                <div class="pagination-holder">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination ">
                                                {{ $category3->appends(request()->input())->links() }}
                                            </ul>
                                        </div>



                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #grid-view -->

                            <div id="list-view" class="products-grid fade tab-pane ">
                                <div class="products-list">
                                    @foreach($category3 as $catepro)
                                    <div class="product-item product-item-holder">
                                        <div class="ribbon red"><span>sale</span></div>

                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="{{asset('../storage/app/public/upload/'.$catepro->pro_img)}}" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">{{$catepro->sale}}% sale</div>
                                                    <div class="title">
                                                        <a href="{{ route('detaipro', $catepro->id) }}">{{$catepro->pro_name}}</a>
                                                    </div>
                                                    <div class="brand">{{$catepro->procate->cate_name ?? ''}}</div>


                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">{{number_format(3450000,0,',','.')}}đ</div>
                                                    <div class="price-prev">{{number_format($catepro->pro_price,0,',','.')}}đ</div>
                                                    <a class="le-button" href="{{route('addcart' , $catepro->id) }}">Thêm </a>

                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->
                                    @endforeach



                                </div><!-- /.products-list -->

                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination">
                                                <li class="current">{{ $category3->appends(request()->input())->links() }}</li>

                                            </ul><!-- /.pagination -->
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <!-- /.result-counter -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->

                            </div><!-- /.products-grid #list-view -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.grid-list-products -->

                </section><!-- /#gaming -->
            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->
@stop
    <!-- ============================================================= FOOTER ============================================================= -->

    <!-- ============================================================= FOOTER : END ============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
