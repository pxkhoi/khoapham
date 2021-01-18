<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\View\View;


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
      if($request -> hasFile('myFile'))
       { 
         $file = $request->file('myFile');
         // var_dump($file);
         if($file->getClientOriginalExtension('myFile')=='JPG')
            {
               $filename = $file->getClientOriginalName('myFile');
               $file->move('Images', $filename); 
               echo "Ten file: ".$filename;
               echo "Da luu file".$filename;
            }
         else {
            echo "Khong duoc phep upload file";
         }
         
       }
       else {
         echo "Vui lòng chọn file";
       }
   }
   //JSON
   public function getJson(){
      $arr = ["Laravel","PHP", "HTML","ASP.net"];

      return response()->json($arr);
   }
   //View
   public function myView()
   {
      return view('myView');
   }
   //View nam tron thu mucj
   public function KhoaPham()
   {
      return view('views.KhoaPham');
   }
   public function Time($t)
   {
      return view('myView',['time'=>$t]);
   }
   }
