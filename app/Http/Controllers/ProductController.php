<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProducts;
use App\Models\products;
use App\Models\category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;

    public function __construct(products $product)
    {
        $this->product = $product;
    }

    public function product(Request $request)
    {
//        $query = products::query();
//        $tailieu = $query->select('category.id', 'B.*')
//            ->join('products AS B', 'B.pro_cate', '=', "category.id");
//        return view('backend.product', compact('tailieu'));

//        $data['prolist']=DB::table('products')->join('category','products.pro_cate', '=', 'category.id')->get();
//        return view('backend.product',$data);
        $data = products::all();
        return view('backend.product', compact('data'));

    }


    public function createpro(AddProducts $requesst)
    {
        $cate = category::all();
        return view('backend.addproduct', compact('cate'));
    }


    public function add(AddProducts $requesst)
    {
        $data = $requesst->all();

        $fileName = '';
        if ($requesst->has('pro_img') && $requesst->pro_img != NULL) {
            $fileName = md5(time() . $requesst->pro_img->getClientOriginalName()) . '.' . $requesst->pro_img->getClientOriginalExtension();
            Storage::putFileAs('public/upload' . DIRECTORY_SEPARATOR, $requesst->file('pro_img'), $fileName);
        }
        $data['pro_img'] = $fileName;

        products::create($data);

    }

    public function editpro($id)
    {
        $pro = products::find($id);
        $cate = category::all();
        return view('backend.editproduct', compact('pro', 'cate'));
    }

    public function updatepro(Request $request, $id)
    {
        $requestData = $request->only('pro_cate', 'pro_name', 'pro_price', 'pro_Warranty', 'pro_accessories', 'pro_condition', 'pro_promotion', 'pro_status', 'pro_decription', 'pro_featured');
        $fileName = '';
        if ($request->has('pro_img') && $request->pro_img != NULL) {
            $fileName = md5(time() . $request->pro_img->getClientOriginalName()) . '.' . $request->pro_img->getClientOriginalExtension();
            Storage::putFileAs('public/upload' . DIRECTORY_SEPARATOR, $request->file('pro_img'), $fileName);
            $requestData['pro_img'] = $fileName;
        }
//        dd($requestData);
        $this->product->whereId($id)->update($requestData);
        return redirect()->route('product');
    }

    public function deletepro($id)
    {
        products::whereId($id)->delete();
        return back();
    }
}
