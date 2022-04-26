<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Register;

class RegisterController extends Controller
{
    public function check_register(Request $request){

        $register_hash = $request->cookie('register_hash');

        $user = new User();

        if(empty($register_hash)){
            return view('welcome', compact('user'));
        }

        $register = Register::where('hash', $register_hash)->first();

        if(!$register){
            return view('welcome', compact('user'));
        }

        $user = $register->user;
        $step = $register->step;

        $user->birthday = date("d/m/Y", strtotime($user->birthday));

        return view('welcome', compact('user', 'step'));
    }
}
