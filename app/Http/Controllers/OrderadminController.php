<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\customer;
use App\Models\follow;
use App\Models\order;


use App\Models\order_detail;
use Illuminate\Http\Request;

class OrderadminController extends Controller
{
    public function getorder()
    {
//
        $donhang=order::where(['stt'=>1,'xoa_order' => 0])->orderBy('created_at','desc')->get();
//        dd($donhang);
        return view('backend.donhang',compact('donhang'));
    }

    public function Dondanggiao()
    {
        $donhang=order::where(['stt'=>2,'xoa_order' => 0])->orderBy('created_at','desc')->get();
//        $donhang= customer::where(['stt'=>2,'xoa_order' => 0])->get();
//        $donhang= customer::where(['stt'=>2])->get();
        return view('backend.donhang',compact('donhang'));
    }

    public function getsporder($id)
    {
//        $order_id= order::where('id_customer',$id)->first();
        $sanpham=order_detail::where('id_order',$id)->orderBy('created_at','desc')->get();
//        dd($sanpham);
//        $donhang= order::where('id_customer',$id)->orderBy('id', 'desc')->get();

        return view('backend.Sanphamoder',compact('sanpham'));
    }
    public function orderhoanthanh(){
        $donhang=order::where(['stt'=>4,'xoa_order' => 0])->orderBy('created_at','desc')->get();
//        $donhang=  customer::where(['stt'=>4,'xoa_order' => 0])->get();
        return view('backend.donhang',compact('donhang'));
    }



    public function sttdonhang($id)
    {

        $sttdh = order::find($id);    // active trạng thái
        if ($sttdh->stt == 1) {
            $sttdh->stt = 2;
            order::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('Dondanggiao')
                ->with('success', 'Cập nhật trạng thái thành công !');
        } elseif($sttdh->stt == 2) {
        $sttdh->stt = 3;
            order::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('Donhoanthanh')
                ->with('success', 'Cập nhật trạng thái thành công !');
        }else{
            $sttdh->stt = 4;
            order::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('huydon')
                ->with('success', 'Cập nhật trạng thái thành công !');
        }
    }

    public function Donhoanthanh()
    {
        $donhang=order::where(['stt'=>3,'xoa_order' => 0])->orderBy('created_at','desc')->get();
//        $donhang=  customer::where(['stt'=>3,'xoa_order' => 0])->get();

        return view('backend.donhang',compact('donhang'));
    }
    public function xoadon($id)
    {

        order::where('id', $id)->update(['xoa_order' => 1]
            );
        order_detail::where('id_order',$id)->update(['stt' => 2]
    );
        return redirect()->route('getorder')
            ->with('success', 'Xóa dữ liệu thành công !');
    }
    public function thongke( Request $request){
//        $thang = $request->get('thang');
        $start_date=$request->get('start_date');
        $end_date=$request->get('end_date');
//        $end_date=null;
//        dd($thang);
//        if($thang == 1)
//        {
////            dd($thang);
//            $start_date= '2020-06-01';
//            $end_date= '2020-06-30';
//        }
//
//        $sodon = order_detail::where('xoa_order',0)

//        $sodon = order_detail::all()->count();
////        dd($sodon);
        $allorder = order_detail::where('stt',1)
            ->where(function($query) use ($start_date, $end_date) {
                if ($start_date != '' && $end_date != '') {
                    return $query->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date);
                }
            })->get();

        $donxoa = order_detail::where('stt',2)
            ->where(function($query) use ($start_date, $end_date) {
                if ($start_date != '' && $end_date != '') {
                    return $query->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date);
                }
            })->get();

        $order = order::where('stt',4);
        $id_order = $order->pluck('id');
        $donhoanthanh= order_detail::whereIn('id_order',$id_order )
            ->where(function($query) use ($start_date, $end_date) {
                if ($start_date != '' && $end_date != '') {
                    return $query->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date);
                }
            })->get();



        return view('backend.thongke',compact('allorder','donxoa','donhoanthanh'));
    }
    public function khuyenmai()
    {
        $khuyemmai= follow::all();
        return view('backend.khuyenmai',compact('khuyemmai'));
    }

}

