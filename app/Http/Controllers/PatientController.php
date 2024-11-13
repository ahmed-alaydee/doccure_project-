<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\patient;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appoinments = Appoinment::with('doctor')
        ->where('patient_id', Auth::user()->id)
        ->get();
       
        return view('patient.index' , compact('appoinments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patient $patient)
    {
        //
    }


    function deleteappoinment($id){
        $app = Appoinment::findOrFail($id);
        $app->delete();
        return back();
    }
    function updateprofile(Request $request){
        $request->validate([
            'name'=>'required',
            
        ]);


        $input = $request->except('image');
        
        if ($request->hasFile('image')) {
            $input = $request->except('image');
            $image = $request->file('image');
            $imagename = uniqid().'.'.$image->getClientOriginalExtension();
    
            $path = "images/$imagename";
        
            $image->move('images/' ,$imagename);    
             
            $input['image'] = $path;
        }

        User::find(Auth::user()->id)->update($input);

        return redirect()->route('patientindex');
    }
    function profile(){

        return view('patient.profile');
    }


    function doctors(){

        $doctors = Doctor::all();

        return view('patient.doctors' , compact('doctors'));
    }


    
    function one_doctor($id){

        $doctor = Doctor::findOrFail($id);


        return view('patient.doctorprofile' , compact('doctor' ));
    }
    function booking($id){

        $doctor = Doctor::findOrFail($id);
        
        $schedules = json_decode($doctor->dates, true);
    
        $availableTimes = [];
    
        foreach ($schedules as $schedule) {
            $availableTimes[$schedule['day']][] = [
                'start_time' => $schedule['start_time'],
                'end_time' => $schedule['end_time'],
            ];
        }



        return view('patient.booking' , compact('doctor' , 'availableTimes'));
  
    }

    function book(Request $request){
        $request->validate([
            'date' =>'required',
            'time' => 'required'
        ]);
        $input = $request->all();

       $data = Appoinment::create($input);
       $doctor = Doctor::findOrFail($data->doctor_id);  
        return view('patient.bookingsuccess' , compact('data' , 'doctor'));
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }



}

