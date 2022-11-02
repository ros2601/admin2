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
Route::get('/', function () {
  return view('welcome');
});
//----------------------------------------for password section---------------------------------------------------------
//for change pswd
Route::get('/password', function () {
  return view('c_pswd');
});
Route::post('/password-change',"App\Http\controllers\bcontroller@password");
Route::post('/ncpassword',"App\Http\controllers\bcontroller@npassword");

//------------------------------------for register or login section-------------------------------------------------------------
//to open the register page
Route::get('/register', function () 
{
  return view('register');
});
//to open the login page
Route::get('/login', function () {
    return view('login');
});
//For registration form
Route::post('/register-form',"App\Http\controllers\bcontroller@register");
//For login form
Route::post('/login-form',"App\Http\controllers\bcontroller@login");
//for logout
Route::get('/logout',"App\Http\controllers\bcontroller@logout");

//--------------------------------------for page section----------------------------------------------------------------
//for summary page or main page
Route::get('/summarypage',"App\Http\controllers\bcontroller@summarypage");

//for add page
Route::get('/addpage', function () {
    return view('pageadd');
  });

//for add page form or table
Route::post('/add-page',"App\Http\controllers\bcontroller@addpage");

//for display summarypage
Route::get('/summarypage',"App\Http\controllers\bcontroller@d_summarypage");

//for delete in summarypage
Route::get('delete_data/{id}',"App\Http\controllers\bcontroller@deletedata");

//for edit of summarypage
Route::get('edit_page/{id}',"App\Http\controllers\bcontroller@editpage");
Route::post('editdata/{id}',"App\Http\controllers\bcontroller@editdata");

//for search
Route::post('search-record',"App\Http\controllers\bcontroller@search");

//-------------------------------------for category section------------------------------------------------------------------
//for add category
Route::get('/addcat', function () {
  return view('addcategory');
});
//for add page form or table
Route::post('/add-category',"App\Http\controllers\bcontroller@addcategory");

//for display summarypage
Route::get('/summarycat',"App\Http\controllers\bcontroller@d_summarycat");

//for delete in summarypage
Route::get('c_delete_data/{id}',"App\Http\controllers\bcontroller@c_deletedata");

//for edit of category summary
Route::get('c_edit_display/{id}',"App\Http\controllers\bcontroller@c_editdisplay");
Route::post('c_editdata/{id}',"App\Http\controllers\bcontroller@c_editdata");

//for search
Route::post('c_search-record',"App\Http\controllers\bcontroller@c_search");
//------------------------------------for product section-----------------------------------------------------------------------------
Route::get('addproduct',"App\Http\controllers\bcontroller@addproductpage");
//form
Route::post('add-product',"App\Http\controllers\bcontroller@addproduct");
//for product summary
Route::get('summaryproduct',"App\Http\controllers\bcontroller@summaryproduct");
//for delete in summarypage
Route::get('p_deletedata/{id}',"App\Http\controllers\bcontroller@p_deletedata");
//for edit of category summary

Route::get('p_editpage/{id}',"App\Http\controllers\bcontroller@p_editdisplay");
Route::post('p_editdata/{id}',"App\Http\controllers\bcontroller@p_editdata");
//for search
Route::post('psearch-record',"App\Http\controllers\bcontroller@psearch");









