
@extends('backend.master')
@section('title','Thành Viên')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 10px">

        <fieldset class="feildset-form">
            <legend>Email khách hàng nhận khuyến mại</legend>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

                <div class="row clearfix"></div>

            <div class="table-responsive " style="margin-top: 20px">
                <div  class="dataTables_wrapper form-inline dt-bootstrap">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable"   >
                        <thead>
                        <tr role="row">
                            <th>
                                STT
                            </th>
                            <th>
                                Email khách
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($khuyemmai as $key=>$data)
                            <tr class="odd">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$data->email}}
                                </td>
                            </tr>
                        @empty
                            <td colspan="8" class="text-center">Không có mail nào</td>
                        @endforelse
                        </tbody>
                    </table>
                    <!-- pagination -->

                </div>
            </div>
        </fieldset>
    </div>  <!--/.main-->


@stop
