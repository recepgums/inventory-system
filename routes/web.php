<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/personeller', 'StaffController@show')->name('show_staff');
Route::post('/personeller', 'StaffController@create')->name('create_staff');
Route::post('/pozisyon_ekle', 'StaffController@create_position')->name('create_position');
Route::post('/personeller/{id}', 'StaffController@edit')->name('edit_staff');



Route::get('/envanter', 'InventoryController@show')->name('show_inventory');
Route::post('/envanter', 'InventoryController@create')->name('create_inventory');
Route::post('/envanter/{id}', 'InventoryController@edit')->name('edit_inventory');



Route::get('/ariza', 'FaultsController@show')->name('show_fault');
Route::post('/ariza', 'FaultsController@create');
Route::post('/ariza/{id}', 'FaultsController@edit')->name('edit_fault');


Route::post('/ariza_ekle', 'FaultsController@create_fault_detail')->name('create_fault_detail');


Route::get('/gorevler', 'TasksController@show')->name('show_tasks');
Route::post('/gorevler', 'TasksController@create')->name('create_task');
Route::post('/gorevler/{id}', 'TasksController@edit')->name('edit_tasks');




Route::get('/yetki_atamasi', 'AssignmentTasksController@show')->name('show_assignment_tasks');
Route::post('/yetki_atamasi', 'AssignmentTasksController@create')->name('create_assignment_tasks');
Route::post('/yetki_atamasi/{id}', 'AssignmentTasksController@edit')->name('edit_assignment');
Route::get('/yetki_atamasi_ajax/{id}', 'AssignmentTasksController@ajax')->name('ajax_show_assignment');
