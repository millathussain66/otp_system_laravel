<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Register extends Model
{
    use HasFactory;


    public static function previus_mail_check() {
       $data = DB::table('users')->select('email_address')->where('email_address',request()->input('email_address'))->first();
       return $data;
    }

    public static function get_insert_data_info($id) {
        $data = DB::table('users')->select('*')->where('id', $id)->first();
        return $data;
     }

    public static function register(){
        $pin = mt_rand(10, 5631);
        $user_id = intval(7777777);
		$data = [
			'pin' => $pin,
			'user_id' =>$user_id,
			'firstname' => trim(request()->input('firstname')),
			'lastname' => trim(request()->input('lastname')),
			'mobile_number' => trim(request()->input('mobile_number')),
			'email_address' => trim(request()->input('email_address')),
			'password' => Hash::make(request()->input('password')),
		];

        $insert_id = DB::table('users')->insertGetId($data);
        return $insert_id;
    }


}
