<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function XinChao()
    {
       echo "Chào các bạn : Controller Xin Chào";
    }
    public function TamBiet()
    {
       echo "Chào các bạn : Controller Tạm BIệt";
    }
    public function KhoaHoc($tenkhoahoc)
    {
       echo "Khoa học : ${tenkhoahoc}";
       return redirect()->route('MyRoute2');
    }
    public function GetURL(Request $request)
    {
              //return $request->path();
            //   return $request->url();
             // return $request->isMethod('GET');
             if($request->isMethod('get'))
               echo "Phương thức GET";
              else
               echo "Không phải pương thức GET"; 
              //return $request->is('myre*');
              
    }
}
