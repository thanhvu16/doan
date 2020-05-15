<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){

        return view('backend.index');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
