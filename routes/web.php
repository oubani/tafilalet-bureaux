<?php

use App\Slide;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'WelcomeController@index');

Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/user', 'UserController@index')->name('user')->middleware('user');
Route::get('/admins', 'AdminController@allAdmins')->name('admins')->middleware('admin');
Route::get('/clients', 'AdminController@allUsers')->name('clients')->middleware('admin');
Route::post('/users', 'AdminController@roleGenerate')->middleware('admin');

Route::get('/ProductsGenerate', 'ProductController@index')->middleware('admin');
Route::post('product', 'ProductController@store')->middleware('admin');
Route::get('/materialInformatiqueGenerate', 'MaterialInformatiqueController@index')->middleware('admin');
Route::post('materialInformatique', 'MaterialInformatiqueController@store')->middleware('admin');


Route::get('/produits', 'ProductController@categored'); // this route to display products to clients
Route::get('/produits/{id}', 'ProductController@categored'); // this route to display product to clients by categories

Route::get('/materials', 'MaterialInformatiqueController@allMaterials'); // this route to display the materials informatique products to clients
Route::get('/material/{id}', 'MaterialInformatiqueController@show'); // this route to display product to client



Route::post('slide', 'SlideController@store');
Route::get('slide', 'SlideController@index');
Route::get('/slide/{id}/edit', 'SlideController@update');

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('/services', 'ServicesController@index');
Route::post('/services', 'ServicesController@update');

Route::get('/Catalgues', 'CatalogueController@allcatalogues');

Route::post('/catalogue', 'CatalogueController@store');
Route::get('/catalogue', 'CatalogueController@index');
// Route::get('/slide/{id}/edit', 'CatalogueController@update');

Route::resource('category', 'CategoryController');

Route::resource('contacts', 'ContactController');

// Route::resource('catalogue', 'CatalogueController');

Route::resource('partenaire', 'PartenaireController');
