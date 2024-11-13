<?php

use App\Models\Appoinment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors' , function(){

$doctors = Doctor::all();

return $doctors;

});

Route::get('/onedoctor' , function(Request $request){

    $id = $request->input('id');

    $doctor = Doctor::findOrFail($id);
    
    return $doctor;
    
});

Route::get('/appoinmentspending' , function (Request $request)
{

    $id = $request->input('id');

    $appoinments = Appoinment::with('user')
    ->where('doctor_id', $id)
    ->where('statues', 'pending')
    ->get();
    
    return $appoinments;

});



Route::get('/appoinmentscinfirmed' , function (Request $request)
{

    $id = $request->input('id');

    $appoinments = Appoinment::with('user')
    ->where('doctor_id', $id)
    ->where('statues', 'confirmed')
    ->get();
    
    return $appoinments;

});


Route::get('/accept' , function (Request $request)
{

    $id = $request->input('id');

$app = Appoinment::find($id);
$input = $request->all();
$input['statues'] = "confirmed";
$app->update($input);

return 'Accepted';

});


Route::get('/cancel' , function (Request $request)
{

$id = $request->input('id');
$app = Appoinment::find($id);
$input = $request->all();
$input['statues'] = "canceled";
$app->update($input);

return 'canceled';

});


Route::get('/delete' , function (Request $request)
{

$id = $request->input('id');
$app = Appoinment::find($id);

$app->delete();

return 'deleted';

});
