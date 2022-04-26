<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Register;

class UserController extends Controller
{
    public function step_one(Request $request){

        $register_hash = $request->cookie('register_hash');

        $request->validate([
            'name'     => 'required',
            'birthday' => 'required'
        ]);

        $dt = explode('/', $request['birthday']);
        $request['birthday'] = $dt[2].'-'.$dt[1].'-'.$dt[0];

        //Apenas atualiza o User caso o step_one seja chamado novamente
        if($register_hash){

            $register = Register::where('hash', $register_hash)->first();

            $user = User::find($register->user->id);
            $user->update($request->all());

            return response('sucesso', 200);
        }

        $user = User::create($request->all());  

        $register = Register::create([
            'hash' => bcrypt(date('c')),
            'user_id' => $user->id,
            'step' => 1
        ]);

        return response('sucesso', 200)->cookie('register_hash', $register->hash, 60); //1 hora
    }

    public function step_two(Request $request){
        
        $register_hash = $request->cookie('register_hash');
        
        $request->validate([
            'address' => 'required',
            'zipcode' => 'required',
            'city'    => 'required',
            'state'   => 'required'
        ]);

        $request['zipcode'] = preg_replace( '/[^0-9]/', '', $request['zipcode']);

        $register = Register::where('hash', $register_hash)->first();
        $register->step = 2;
        $register->update();

        $user = User::find($register->user->id);
        $user->update($request->all());

        return response('sucesso', 200);
    }

    public function step_three(Request $request){

        $register_hash = $request->cookie('register_hash');
        
        $request->validate([
            'phone'     => 'required',
            'cellphone' => 'required'
        ]);

        $request['phone'] = preg_replace( '/[^0-9]/', '', $request['phone']);
        $request['cellphone'] = preg_replace( '/[^0-9]/', '', $request['cellphone']);

        $register = Register::where('hash', $register_hash)->first();
        $register->step = 3;
        $register->update();

        $user = User::find($register->user->id);
        $user->update($request->all());

        return response('sucesso', 200)->withoutCookie('register_hash');
    }
}
