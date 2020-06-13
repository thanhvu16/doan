<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\follow;
use App\Models\order;
use App\Models\products;
use App\Models\category;
use App\Models\comment;
use App\Models\address;
use App\Models\file_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FontendController extends Controller
{

    public function getindex(){
        $future= products::where(['pro_featured'=>1,'pro_status'=>1])->orderBy('id','desc')->get()->take(8) ;
        $new= products::where('pro_status',1)->orderBy('id','desc')->get()->take(8) ;
        $apple= products::where(['pro_cate'=>1,'pro_status'=>1])->orderBy('id','desc')->get()->take(4) ;
        $samsung= products::where(['pro_cate'=>2,'pro_status'=>1])->orderBy('id','desc')->get()->take(4) ;

        $applewatch1= products::where(['pro_cate'=>12,'pro_status'=>1])->orderBy('id','desc')->get()->take(3);
        $applewatch2= products::where(['pro_cate'=>12,'pro_status'=>1])->orderBy('id','asc')->get()->take(3);
        $phukien= products::where(['pro_cate'=>13,'pro_status'=>1])->orderBy('id','asc')->get()->take(3);
        $phukien2= products::where(['pro_cate'=>13,'pro_status'=>1])->orderBy('id','desc')->get()->take(3);

        $applewatch3= products::where(['pro_cate'=>12,'pro_status'=>1])->orderBy('id','asc')->first();
        $airpos= products::where(['id'=>27,'pro_status'=>1])->first();





        return view('fontend.home',compact('future','new','applewatch1','applewatch2','applewatch3','phukien','phukien2','apple','samsung','airpos'));
    }

    public function gioithieu()
    {
        return view('fontend.gioithieu');
    }

    public function getDeltail($id){
        $comment = comment::where('cmt_product',$id)->get();
        $detaipro=products::find($id);
        $anhsp =file_product::where('id_products',$id)->get();


        return view('fontend.details',compact('detaipro','comment','anhsp'));
    }

    public function getDeltailcate($id){
        $catename=category::find($id);
//        dd($id);
        $category3 = products::where('pro_cate',$id)->paginate(3);;



        return view('fontend.category',compact('category3','catename'));
    }


    public function lienhe(){

        return view('fontend.Lienhe');
    }
    public function tintuc(){

        return view('fontend.tintuc');
    }
    public function baohanh(){
        $baohanh=address::all();
        return view('fontend.baohanh',compact('baohanh'));
    }

    public function tracuudonhang(Request $request){
        $phone = $request->get('phone');
//        $donhang=customer::where('phone', $request['phone'])->count();
        $customer=customer::where('phone', $request['phone'])->get();

        $customer_id = $customer->pluck('id');

        $donhang1=order::with('orderDetail')->whereIn('id_customer',$customer_id )->where('xoa_order',0)->whereIn('stt',[1,2,3])->get();
//        dd($donhang1);
        $donhang=order::with('orderDetail')->whereIn('id_customer',$customer_id )->where('xoa_order',0)->whereIn('stt',[1,2,3])->count();
//        dd($donhang1);
//            ->where(function ($query) use ($phone) {
//                if (!empty($phone)) {
//                    return $query->where('phone', $phone);
//                }
//            })->get();



        return view('fontend.tracuudon',compact('donhang1','donhang'));
    }

    public function timkiemsanpham(Request $request)
    {

        $seachpro= $request->key;

        $pro= products::where('pro_name','like','%'.$seachpro.'%')->where('pro_status',1)->paginate(3);

        return view('fontend.timkiem',compact('pro'));
    }


    public function comment(Request $request,$id){

        $datacmt  = $request->all();

        $datacmt['cmt_product'] = $id;
        comment::create($datacmt);
        return back();
    }
    public function seach(Request $request){
        $seachpro= $request->seach;

        $data= products::where('pro_name','like','%'.$seachpro.'%')->paginate(2);
        return view('fontend.search',compact('data','seachpro'));
    }

    public function dangnhap(Request $request){

        return view('fontend.dangnhap');
    }
    public function mem(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($arr)){
            return redirect()->route('indexhome');
        }else{

            return redirect()->back()
                ->with('erro', 'Tài Khoản mật khẩu chưa đúng !');
        }
    }
    public function dangky(Request $request){

        return view('fontend.dangky');
    }
    public function theodoikm(Request $request)
    {
//        dd($request);
        $theodoi = new follow();
        $theodoi->email=$request->email;
        $theodoi->save();
        return redirect()->back();
    }
}
