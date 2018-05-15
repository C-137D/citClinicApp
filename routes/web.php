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
use Carbon\Carbon; 	
use App\Queue;
use App\Patient;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::delete('patients/{id}/delete', 'PatientsController@delete');

Route::get('patients/trashed', 'PatientsController@trashed');
Route::get('patients/restoreall', 'PatientsController@restoreall');

Route::delete('patients/{id}/restore', 'PatientsController@restore');
Route::delete('patients/{id}/deleteforever', 'PatientsController@deleteforever');


Route::delete('prescriptions/{id}/delete', 'PrescriptionsController@delete');

Route::get('prescriptions/trashed', 'PrescriptionsController@trashed');
Route::get('prescriptions/restoreall', 'PrescriptionsController@restoreall');

Route::delete('prescriptions/{id}/restore', 'PrescriptionsController@restore');
Route::delete('prescriptions/{id}/deleteforever', 'PrescriptionsController@deleteforever');


Route::delete('complaints/{id}/delete', 'ComplaintsController@delete');

Route::get('complaints/trashed', 'ComplaintsController@trashed');
Route::get('complaints/restoreall', 'ComplaintsController@restoreall');

Route::delete('complaints/{id}/restore', 'ComplaintsController@restore');
Route::delete('complaints/{id}/deleteforever', 'ComplaintsController@deleteforever');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('patients', 'PatientsController');
Route::resource('complaints', 'ComplaintsController');
Route::resource('prescriptions', 'PrescriptionsController');
Route::resource('queues', 'QueuesController');


Route::get('/queue',function(){
	$queues = Queue::whereDate('created_at',Carbon::today())->orderBy('updated_at','desc')->get();
	return View::make('queued',compact('queues'))->with('autofocus', true);
});

Route::get('apiQueue', function(){
	$queues = Queue::orderBy('updated_at','desc')->get();
	return $queues;
});


