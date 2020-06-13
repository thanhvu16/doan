
@extends('backend.master')
@section('title','Thành Viên')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 10px">

        <fieldset class="feildset-form">
            <legend>Thống kê sản phẩm đã mua theo ngày</legend>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{route('thongke')}}" method="get">
{{--                <div class="col-md-3">--}}
{{--                    <select--}}
{{--                        class="form-control show-tick dropdown-search select-so-van-ban"--}}
{{--                        data-don-vi="26" name="thang" id="thang" required>--}}
{{--                        <option>---Chọn tháng---</option>--}}
{{--                        <option value="1">Tháng 1</option>--}}
{{--                        <option value="2">Tháng 2</option>--}}
{{--                        <option value="3">Tháng 3</option>--}}
{{--                        <option value="4">Tháng 4</option>--}}
{{--                        <option value="5">Tháng 5</option>--}}
{{--                        <option value="6">Tháng 6</option>--}}
{{--                        <option value="7">Tháng 7</option>--}}
{{--                        <option value="8">Tháng 8</option>--}}
{{--                        <option value="9">Tháng 9</option>--}}
{{--                        <option value="10">Tháng 10</option>--}}
{{--                        <option value="11">Tháng 11</option>--}}
{{--                        <option value="12">Tháng 12</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="col-md-3">
                    <input type="date" name="start_date" required>
                    <input type="date" name="end_date" required>
                </div>
                <div class="col-md-3 ">
                    <button class="btn btn-danger">tìm kiếm</button>
                </div>
                <div class="row clearfix"></div>
                <H2>Tất cả sản phẩm đang thực hiện</H2>
            <div class="table-responsive " style="margin-top: 20px">
                <div  class="dataTables_wrapper form-inline dt-bootstrap">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable"   >
                        <colgroup width="100%">
                            <col style="width: 5%;">
                            <col style="width: 60%;">
                            <col style="width: 15%;">
                            <col style="width: 20%;">

                        </colgroup>
                        <thead>
                        <tr role="row">
                            <th>
                                STT
                            </th>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Giá Tiền
                            </th>
                            <th>
                                Ngày Mua
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($allorder as $key=>$data)
                            <tr class="odd">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$data->product->pro_name ?? ''}}
                                </td>
                                <td style="color: red">{{number_format($data->gia,0,',','.')}}đ</td>

{{--                                <td>{{!empty((int) $data->created_at) ? date('d/m/Y',strtotime($data->created_at)) : ''}}</td>--}}
                                <td>{{ $data->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <td colspan="8" class="text-center">Không có sản phẩm nào</td>
                        @endforelse
                        </tbody>
                    </table>
                    <!-- pagination -->

                </div>
            </div>
                <h2>Sản phẩm khách đã hủy</h2>
                <div class="table-responsive " style="margin-top: 20px">
                    <div  class="dataTables_wrapper form-inline dt-bootstrap">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable"   >
                            <colgroup width="100%">
                                <col style="width: 5%;">
                                <col style="width: 60%;">
                                <col style="width: 15%;">
                                <col style="width: 20%;">

                            </colgroup>
                            <thead>
                            <tr role="row">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên sản phẩm
                                </th>
                                <th>
                                    Giá Tiền
                                </th>
                                <th>
                                    Ngày Mua
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donxoa as $key=>$data)
                                <tr class="odd">
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$data->product->pro_name ?? ''}}
                                    </td>
                                    <td style="color: red">{{number_format($data->gia,0,',','.')}}đ</td>

                                    {{--                                <td>{{!empty((int) $data->created_at) ? date('d/m/Y',strtotime($data->created_at)) : ''}}</td>--}}
                                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center">Không có sản phẩm nào</td>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- pagination -->

                    </div>
                </div>

                <h2>Sản phẩm khách đã mua thành công</h2>
                <div class="table-responsive " style="margin-top: 20px">
                    <div  class="dataTables_wrapper form-inline dt-bootstrap">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable"   >
                            <colgroup width="100%">
                                <col style="width: 5%;">
                                <col style="width: 60%;">
                                <col style="width: 15%;">
                                <col style="width: 20%;">

                            </colgroup>
                            <thead>
                            <tr role="row">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên sản phẩm
                                </th>
                                <th>
                                    Giá Tiền
                                </th>
                                <th>
                                    Ngày Mua
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donhoanthanh as $key=>$data)
                                <tr class="odd">
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$data->product->pro_name ?? ''}}
                                    </td>
                                    <td style="color: red">{{number_format($data->gia,0,',','.')}}đ</td>

                                    {{--                                <td>{{!empty((int) $data->created_at) ? date('d/m/Y',strtotime($data->created_at)) : ''}}</td>--}}
                                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center">Không có sản phẩm nào</td>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- pagination -->

                    </div>
                </div>
            </form>
        </fieldset>
    </div>  <!--/.main-->


@stop
