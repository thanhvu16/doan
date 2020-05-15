@extends('fontend.master')
@section('title','Tìm Kiếm')
@section('main')
	<link rel="stylesheet" href="css/search.css">


					<div id="wrap-inner">
						<div class="products">
							<h3>Tìm kiếm với từ khóa: <span>{{$seachpro}}</span></h3>
							<div class="product-list row">
                                @foreach($data as $data1)
                                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                        <a href="#"><img  style="height: 173px" src="{{asset('../storage/app/public/upload/'.$data1->pro_img)}}" class="img-thumbnail img-responsive"></a>
                                        <p style=" "><a href="#">{{$data1->pro_name}}</a></p>
                                        <p class="price" >{{number_format($data1->pro_price,0,',','.')}}đ</p>
                                        <a href="{{ route('detaipro', $data1->id) }}">Xem chi tiết</a>
                                        <div class="marsk">
                                            </div>
                                    </div>
                                @endforeach
							</div>
						</div>

						<div id="pagination">
							<ul class="pagination pagination-lg justify-content-center">
								{{$data->links()}}
							</ul>
						</div>
					</div>

@stop
