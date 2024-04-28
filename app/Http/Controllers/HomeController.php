<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Events\StatusLiked;
use App\Mail\SendOTPMail;
use App\Models\Register;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    // protected $Register;

    // public function __construct()
    // {
    // 	$this->Register = new Register();
    // }

    public function index()
    {
        return view('register');
    }

    public function otp_form() {
        $session_data =  Session::get('session_user');
        return view('otp_form', ['session_data' => $session_data]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email_address'     => 'required|email|max:255',
            // 'mobile_number' => ['required', 'regex:/^[0-9]{11}$/'], // Assuming 11 digit mobile number
            'password' => ['required', 'string', 'min:8'], // Adjust criteria as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $message = '';
            $status = '';
            $id = '';
            $email_address = '';
            $email_chk = Register::previus_mail_check();
            if (empty($email_chk)) {
                $id = Register::register();
                if (!empty($id) && $id != 0) {
                    $message = "You Are Register Successfully";
                    $status = "Ok";
                    $current_insert_data =  Register::get_insert_data_info($id);
                    $email_address = $current_insert_data->email_address;
                    $otp = rand(100000, 999999);
                    $otp_code = [
                        'email' => $email_address,
                        'otp' => $otp,
                        'timestamp' => time(), // Add the timestamp when OTP was generated
                    ];

                    session()->flush();
                   // session()->forget('OTP');
                    Session::put('OTP', $otp_code);

                    $session_data = [
                            'id' => $current_insert_data->id,
                            'user_id' => $current_insert_data->user_id,
                            'firstname' => $current_insert_data->firstname,
                            'lastname' => $current_insert_data->lastname,
                            'user_group_id' => $current_insert_data->user_group_id,
                            'mobile_number' => $current_insert_data->mobile_number,
                            'email_address' => $current_insert_data->email_address,
                    ];
                    //session()->forget('session_user');
                    Session::put('session_user', $session_data);
                    Mail::to($email_address)->send(new SendOTPMail($otp));
                }
            } else {
                $message = "This email address is already registered. Please try another email address.";
                $status = "notOk";
            }

            $var = [];
            $var['message'] = $message;
            $var['status'] = $status;
            $var['id'] = $id;
            $var['email_address'] = $email_address;
            $var['csrf_token'] = csrf_token();
            return response()->json($var);
        }
    }

    public function otp(Request $request)
    {

        $email_address = $request->input('email_address_otp');
        $user_otp = $request->input('otp_code');
        $otp_code = Session::get('OTP');
        $var = [];
        if ($otp_code && isset($otp_code['otp']) && isset($otp_code['timestamp'])) {
            $timestamp = $otp_code['timestamp'];
            $otp = $otp_code['otp'];

            // Check if the OTP is expired (current time - timestamp > 60 seconds)
            if (time() - $timestamp > 3000) {    

                $var['message'] = "OTP has expired";
                $var['status'] = "NotOk";

            } else {
                if ($otp_code['otp'] == $user_otp) {
                    $var['message'] = "OTP Verified Successfully";
                    $var['status'] = "Ok";
                } else {
                    $var['message'] = "OTP Verification Failed";
                    $var['status'] = "NotOk";
                }
            }
        } 
        $var['email_address'] = $email_address;
        $var['csrf_token'] = csrf_token();
        return response()->json($var);

    }

    public function dashboard() {
        
        echo "dashboard";

    }
}
