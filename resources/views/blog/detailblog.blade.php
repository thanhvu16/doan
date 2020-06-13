@extends('fontend.master')
@section('title',' Sản Phẩm')
@section('main')
    <section id="blog-single">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <div class="posts col-md-9">
                <div class="post-entry">
                    <div class="clearfix">
                        <!-- ========================================== SECTION – HERO ========================================= -->
                        <div id="hero">
                            <div id="owl-main" class="owl-carousel owl-carousel-blog owl-inner-nav owl-ui-sm" style="margin-top: 10px">

                                <div class="item">
                                    <img src="{{asset('../storage/app/public/upload/blog/'.$data->imges)}}" alt="">
                                </div><!-- /.item -->

                                <div class="item">
                                    <img src="assets/images/blog-post/slider-2.jpg" alt="">
                                </div><!-- /.item -->

                                <div class="item">
                                    <img src="assets/images/blog-post/slider-1.jpg" alt="">
                                </div><!-- /.item -->

                            </div><!-- /.owl-carousel -->
                        </div>
                        <!-- ========================================= SECTION – HERO : END ========================================= -->
                    </div><!-- /.clearfix -->

                    <div class="post-content">
                        <h2 class="post-title">{{$data->tiles}}</h2>
                        <ul class="meta">
                            <li>Posted By : Admin</li>
                            <li>{{date('d/m/Y',strtotime( $data->date))}}</li>

                        </ul><!-- /.meta -->
                        <p class="highlight">{{$data->short_decription}}</p>
                        <p>{!!  $data->description!!}</p>
                    </div><!-- /.post-content -->
                </div><!-- /.post-entry -->






            </div><!-- /.posts -->

            <!-- ========================================= CONTENT :END ========================================= -->

            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-md-3">
                <aside class="sidebar blog-sidebar">

                    <div class="widget clearfix">

                    </div><!-- /.widget -->

                    <div class="widget">
                        <div class="simple-banner">
                            <img alt="" class="img-responsive" src="assets/images/hi.jpg" data-echo="assets/images/banners/hi.jpg" />
                        </div>
                    </div>

                    <div class="widget">
                        <h4>Hãng điện thoại</h4>
                        <div class="body">
                            <ul class="le-links">
                                @foreach($category as $cate)
                                    <li><a href="{{route('detaicate',$cate->id)}}">{{$cate->cate_name}}</a></li>
                                @endforeach
                            </ul><!-- /.le-links -->
                        </div>
                    </div><!-- /.widget -->

                    <div class="widget">
                        <div class="simple-banner">
                            <img alt="" class="img-responsive" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-simple.jpg" />
                        </div>
                    </div>

                    <!-- ========================================= RECENT POST ========================================= -->
                    <div class="widget">
                        <h4>Bài Viết Khác</h4>
                        <div class="body">
                            <ul class="recent-post-list">
                                @foreach($datablog as $item)
                                <li class="sidebar-recent-post-item">
                                    <div class="media">
                                        <a href="{{route('blogchitiet',$item->id)}}" class="thumb-holder pull-left">
                                            <img alt="" class="img-responsive" src="{{asset('../storage/app/public/upload/blog/'.$item->imges)}}"  />
                                        </a>
                                        <div class="">
                                            <h5><a href="{{route('blogchitiet',$item->id)}}" style="font-family: Arial">{{$item->tiles}} </a></h5>
                                            <div class="posted-date">{{date('d/m/Y',strtotime( $item->date))}}</div>
                                        </div>
                                    </div>
                                </li><!-- /.sidebar-recent-post-item -->
                                @endforeach


                            </ul><!-- /.recent-post-list -->
                        </div><!-- /.body -->
                    </div><!-- /.widget -->
                    <!-- ========================================= RECENT POST : END ========================================= -->


                </aside><!-- /.sidebar .blog-sidebar -->
            </div><!-- /.col -->
            <!-- ========================================= SIDEBAR : END ========================================= -->

            <!-- ========================================= CONTENT ========================================= -->
        </div>
    </section>
@stop

    <!-- ============================================================= FOOTER ============================================================= -->


<!-- For demo purposes – can be removed on production -->
