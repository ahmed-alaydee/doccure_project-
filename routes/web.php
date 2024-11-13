<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Mail\TestEmail;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return redirect()->route('patientindex');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Doccure', function () {
    return view('welcome');
})->name('Doccure');




Auth::routes();
//Patient 
Route::middleware(['auth'])->group(function (){
    Route::get('/index' , [PatientController::class , 'index'])->name('patientindex');
    Route::get('/doctors' , [PatientController::class , 'doctors'])->name('doctors');
    Route::get('/doctorprofile{id}' , [PatientController::class , 'one_doctor'])->name('doctorprofile');
    Route::get('/booking{id}' , [PatientController::class , 'booking'])->name('booking');
    Route::post('/booking' , [PatientController::class , 'book'])->name('book');
    Route::get('/patientlogout' , [PatientController::class , 'logout'])->name('patientlogout');
    Route::get('/bookingsuccess' , [PatientController::class , 'book'])->name('booksuccess');
    Route::get('/patientprofile' , [PatientController::class , 'profile'])->name('patientprofile');
    Route::post('/updateprofile' , [PatientController::class , 'updateprofile'])->name('updateprofile');
    Route::get('/deleteappoinment{id}' , [PatientController::class , 'deleteappoinment'])->name('deleteappoinment');
});







//Doctor Routes
Route::get('/doctorlogin' , [DoctorController::class , 'doctorlogin'])->name('doctorlogin');
Route::post('/doctorlogin' , [DoctorController::class , 'logindoctor'])->name('logindoctor');
Route::get('/doctorregister' , [DoctorController::class , 'doctorregister'])->name('doctorregister');
Route::post('/registerdoctor' , [DoctorController::class , 'registerdoctor'])->name('registerdoctor');
Route::middleware(['doctors'])->group(function() {
Route::get('/doctorindex' , [DoctorController::class , 'index'])->name('doctorindex');
Route::get('/logoutdoctor' , [DoctorController::class , 'logoutdoctor'])->name('logoutdoctor');
Route::get('/appoinments' , [DoctorController::class , 'appoinments'])->name('appoinments');
Route::get('/profile' , [DoctorController::class , 'profile'])->name('profile');
Route::post('/updatedata' , [DoctorController::class , 'updatedata'])->name('updatedata');
Route::get('/accept{id}' , [DoctorController::class , 'acceptappoinment'])->name('acceptappoinment');
Route::get('/cancel{id}' , [DoctorController::class , 'cancelappoinment'])->name('cancelappoinment');

});

