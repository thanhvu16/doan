<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\customer;
use App\Models\order;


use App\Models\order_detail;
use Illuminate\Http\Request;

class OrderadminController extends Controller
{
    public function getorder()
    {
        $donhang= customer::where(['stt'=>1,'xoa_order' => 0])->get();
        return view('backend.donhang',compact('donhang'));
    }

    public function Dondanggiao()
    {
        $donhang= customer::where(['stt'=>2,'xoa_order' => 0])->get();
//        $donhang= customer::where(['stt'=>2])->get();
        return view('backend.donhang',compact('donhang'));
    }

    public function getsporder($id)
    {
        $order_id= order::where('id_customer',$id)->first();
        $sanpham=order_detail::where('id_order',$order_id->id)->get();
//        dd($sanpham);
//        $donhang= order::where('id_customer',$id)->orderBy('id', 'desc')->get();

        return view('backend.Sanphamoder',compact('sanpham'));
    }
    public function orderhoanthanh(){
        $donhang=  customer::where(['stt'=>4,'xoa_order' => 0])->get();
        return view('backend.donhang',compact('donhang'));
    }



    public function sttdonhang($id)
    {

        $sttdh = customer::find($id);    // active trạng thái
        if ($sttdh->stt == 1) {
            $sttdh->stt = 2;
            customer::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('Dondanggiao')
                ->with('success', 'Cập nhật trạng thái thành công !');
        } elseif($sttdh->stt == 2) {
        $sttdh->stt = 3;
            customer::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('Donhoanthanh')
                ->with('success', 'Cập nhật trạng thái thành công !');
        }else{
            $sttdh->stt = 4;
            customer::where('id', $id)->update(['stt' => $sttdh->stt]);
            return redirect()->route('huydon')
                ->with('success', 'Cập nhật trạng thái thành công !');
        }
    }

    public function Donhoanthanh()
    {
        $donhang=  customer::where(['stt'=>3,'xoa_order' => 0])->get();

        return view('backend.donhanghoanthanh',compact('donhang'));
    }
    public function xoadon($id)
    {

        customer::where('id', $id)->update(['xoa_order' => 1]
            );
        return redirect()->route('getorder')
            ->with('success', 'Xóa dữ liệu thành công !');
    }

}

