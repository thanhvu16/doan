
@extends('backend.master')
@section('title','Thành Viên')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 40px">

        <fieldset class="feildset-form">
            <legend>Chi Tiết Đơn Hàng</legend>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <div  class="dataTables_wrapper form-inline dt-bootstrap">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" >
                        <colgroup width="100%">
                            <col style="width: 5%;">
                            <col style="width: 40%;">
                            <col style="width: 10%;">
                            <col style="width: 25%;">
                            <col style="width: 15%;">

                        </colgroup>
                        <thead>
                        <tr role="row">
                            <th class="text-center">
                                STT
                            </th>
                            <th>
                                Tên Sản Phẩm
                            </th>
                            <th>
                                Số Lượng
                            </th>
                            <th>
                                Hình ảnh sản phẩm
                            </th>
                            <th>
                                Giá Tiền
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sanpham as $key=>$data)
                            <tr class="odd">
                                <td class="text-center">
                                    {{$key+1}}
                                </td>
                                <td style="font-weight: bold">
                                    {{$data->product->pro_name}}
                                </td>

                                <td>
                                    {{$data->sl}}
                                </td>
                                <td>
                                    <img src="{{asset('../storage/app/public/upload/'.$data->product->pro_img)}}" height="200px" alt="">
                                </td>
                                <td style="color: red">
                                    {{number_format($data->gia,0,',','.')}}đ
                                </td>

                                @empty
                            </tr>

                            <td colspan="4" class="text-center">Không tìm thấy dữ liệu.</td>
                        @endforelse
                        </tbody>
                    </table>
                    <!-- pagination -->

                </div>
            </div>
            <div class="buttons-holder text-right">
                <a class="simple-link block" href="{{route('getorder')}}" >Quay lại</a>
            </div>
        </fieldset>
    </div>  <!--/.main-->


@stop
