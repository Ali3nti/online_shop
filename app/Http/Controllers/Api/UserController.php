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
