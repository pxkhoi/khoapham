<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ROUTE CƠ BẢN--------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('abc', function () {
    echo "ABC xin chào";
});
Route::get('def', function () {
    return  "DEF xin chào";
});

Route::get("ghi", function(){
 echo "KK AA";
});
Route::get("abc1", function(){
 echo "<h1>ABC xin chào</h1>";
});

// TRUYỀN THAM SỐ--------------
//Tối đa truyền 4 số
Route::get("user/{id}", function($id){
    Return "User có id là:  ${id}";
})->where(['id'=>'[0-9]{4}']);
//Dấu + có nghĩa là nhiều số , {4} là được 4 số
//Nối{2,6} thấp nhất 2 và lớn nhất 6.
Route::get("noi/{id}", function($id){
    echo "User có id là:  " .$id;
})->where(['id'=>'[0-9a-zA-Z]{2,6}+']);

Route::get('/user/{name}', function ($name) {
    echo "Banj ten la:".$name;
})->where('name', '[A-Za-z]+');

Route::get('/ten/{id}/{name}', function ($id, $name) {
    echo "<h1>Ban có tên là ${name} và ID: ${id}</h1>";
    echo "Bạn có tên là ".$name." và id: ".$id;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//Định danh cho ROUTE
//Tên Route là duy nhất
//Cách 1
Route::get('Route1',['as'=>'MyRoute' ,function () {
    return  "Xin chào, Mình là Route1";
}]);
//Cách 2
Route::get('Route2',function () {
    return  "Xin chào, Mình là Route2";
})->name('MyRoute2');


//Phân biệt chữ Hoa và thường route('MyRoute')
Route::get('rroute1',function () {
    return  redirect()->route('MyRoute');
});
Route::get('rroute2',function () {
    return  redirect()->route('MyRoute2');
});

//NHÓM ROUTE
Route::group(['prefix'=>'admin'], function(){
    Route::get('/user',function(){
        echo "Usser";
    });
    Route::get('/product',function(){
        echo "Product";
    });
    Route::get('/news',function(){
        echo "News";
    });
});

//GỌI CONTROLLER
//1. Tạo controller bằng câu lệnh $php artisan make:controller MyController
//2. Gọi Controller tại Route
Route::get('goicontroller1','Mycontroller@XinChao');
Route::get('goicontroller2','Mycontroller@TamBiet');
Route::get('khoahoc/{tenkhoahoc}','Mycontroller@KhoaHoc');

//LÀM VIỆC VỚI REQUEST
Route::get('myrequest','Mycontroller@GetURL');