<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(Request $request)
    {
        $user = DB::table('users')
            ->where('id',$request->id)
            ->first();

        return $message = array(
            'status' => 1,
            'message' => 'User data returned seccessfully',
            'data' => $user
        );
    }
    
        public function signIn(Request $request)
    {
        $phoneNumber = $request->phone_number;

        $user = DB::table('users')
            ->where('phone',$phoneNumber)
            ->first();
        if($user){
            return $message = array(
            'status' => 1,
            'message' => 'User data returned seccessfully',
            'data' => $user
        );
        }else{
            return $message = array(
            'status' => 2,
            'message' => 'User not exist but you can sign up'
        );
        }
    }
           public function verifyNumber(Request $request)
    {
        $phoneNumber = $request->phone_number;
        $code = $request->code;

        $user = DB::table('users')
            ->where('phone',$phoneNumber)
            ->first();
        if($user["code"] ==$code){
            return $message = array(
            'status' => 1,
            'message' => 'User verified seccessfully',
            'data' => $user
        );
        }else{
            return $message = array(
            'status' => 0,
            'message' => 'User not verified'
        );
        }
    }
    public function signUp(Request $request)
    {
        $phoneNumber = $request->phone;

        $user = DB::table('users')
            ->where('phone',$phoneNumber)
            ->first();

        if($user){

        }else{

        }

        // $otp->

        $user = DB::table('users')
            ->where('id',$request->id)
            ->first();

        return $message = array(
            'status' => 1,
            'message' => 'User data returned seccessfully',
            'data' => $user
        );
    }
}
