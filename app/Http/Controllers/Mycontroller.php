<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Http\Requests;

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
    public function postForm(Request $request)
    {
       echo $request -> HoTen;
    }

   public function setCookie()
   {
      $response = new Response();
      $response ->withCookie('tenCookie','Gia tri Cookie',0.1);
      echo "Cookie của bạn đã set";
      return $response;
   }
   public function getCookie(Request $request)
   {
      echo "Cookie của bạn là: ";
      return $request->cookie('tenCookie');
   }
   public function postFile(Request $request)
   {
      if($request -> has('myFile'))
       { 
         $file = $request->file('myFile');
         if($file ->getClientOriginalExtention('myFile')=='JPG')

         
         $filename = $file->getClientOriginalName('myFile');
         echo "Ten file: ".$filename;
         $file->move('Images', $filename);
       }
       else{
         echo "Vui lòng chọn file";
       }
   }
   
   }
