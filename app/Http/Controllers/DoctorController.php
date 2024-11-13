<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\User;
use App\Mail\TestEmail;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       //$appoinments = Appoinment::with('user' , 'doctor')->get(); 
       $appoinments = Appoinment::with('user')
       ->where('doctor_id', Auth::guard('doctors')->user()->id)
       ->where('statues', 'pending')
       ->get();
        return view('doctor.index' , compact('appoinments'));
    }

    function updatedata(Request $request){

        $data = $request->validate([
        'day' => 'required|array',
        'day.*' => 'required|string',
        'start_time' => 'required|array',
        'start_time.*' => 'required|date_format:H:i',
        'end_time' => 'required|array',
        'end_time.*' => 'required|date_format:H:i|after:start_time.*',
        ]);

      
        $input = $request->except('image' , );
        
        if ($request->hasFile('image')) {
            $input = $request->except('image');
            $image = $request->file('image');
            $imagename = uniqid().'.'.$image->getClientOriginalExtension();
    
            $path = "images/$imagename";
        
            $image->move('images/' ,$imagename);    
             
            $input['image'] = $path;
        }
      
        $schedules = [];
        for ($i = 0; $i < count($data['day']); $i++) {
            $schedules[] = [
                'day' => $data['day'][$i],
                'start_time' => $data['start_time'][$i],
                'end_time' => $data['end_time'][$i],
            ];
        }
      
        $jsonData = json_encode($schedules);
      
        $input['dates'] = $jsonData;

        Doctor::find(Auth::guard('doctors')->user()->id)->update($input);

        return redirect()->route('doctorindex');

    }

    function profile(){

        $Data = Doctor::find(Auth::guard('doctors')->user()->id);
        return view('doctor.profile' , compact('Data'));
    }

    public function appoinments()
    {
        $appoinments = Appoinment::with('user')
        ->where('doctor_id', Auth::guard('doctors')->user()->id)
        ->where('statues', 'confirmed')
        ->get();
       
        return view('doctor.appoinments' , compact('appoinments'));
    }

    function acceptappoinment(Request $request,$id){
        $app = Appoinment::find($id);
        $input = $request->all();
        $input['statues'] = "confirmed";
        $app->update($input);
        return back();
    }
    function cancelappoinment(Request $request,$id){
        $app = Appoinment::find($id);
        $input = $request->all();
        $input['statues'] = "canceled";
        $app->update($input);
        return back();
    }

    function doctorlogin(){
        return view('doctor.login');
    }

    function logindoctor(Request $request){

        $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);

        $creditionals = $request->only('email' , 'password');

        if (Auth::guard('doctors')->attempt($creditionals)) {
      
            $recipient = Auth::guard('doctors')->user()->email;
            $messageContent  = 'You have login to your account'; 
            Mail::raw($messageContent, function ($message) use ($recipient) {
                $message->to($recipient)
                        ->subject('Login Email');
            });
            return redirect()->route('doctorindex');
        }

        return back();
    }

    function doctorregister(){
        return view('doctor.register');
    }

    function registerdoctor(Request $request){

        $request->validate([
            'name' => 'required',
            'email' =>'required | email |string',
            'password' => 'required'
        ]);

        $input = $request->except('password');
        $input['password'] = Hash::make($request->password);

        Doctor::create($input);

        return redirect()->route('doctorlogin');
    }


    function logoutdoctor(){
       
        $recipient = Auth::guard('doctors')->user()->email;
        $messageContent  = 'You have logout from your account'; 
        Mail::raw($messageContent, function ($message) use ($recipient) {
            $message->to($recipient)
                    ->subject('Logout Email');
        });

        Auth::guard('doctors')->logout();
        return  redirect()->route('doctorlogin');

    }

}
