<?php

namespace App\Http\Controllers;
use App\Models\member;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function member(){
        $member = member::all();
        return view('backend.member',compact('member'));
    }

    public function createmem(){

        return view('backend.addmember');

    }
    public function add(Request $request){
        $data = $request->all();
        member::create($data);

        return redirect()->route('member')
            ->with('success', 'Thêm tài khoản thành công !');
    }
    public function editmem($id){
        $memner = member::find($id);
        return view('backend.editmember',compact('memner'));
    }
    public function updatemem(Request $request,$id){
        $requestData = $request->all();
        member::where('id', $id)->update(
            [
                'name' => $requestData['name'],
                'phone' => $requestData['phone'],
                'address' => $requestData['address'],
                'password' => $requestData['password']


            ]
        );

        return redirect()->route('member')
            ->with('success', 'Cập nhật tài khoản thành công !');


    }
    public function deletemem($id){
        member::whereId($id)->delete();

        return back()
            ->with('success', 'Thêm tài khoản thành công !');
    }
}
