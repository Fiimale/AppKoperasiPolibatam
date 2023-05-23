<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("sesi/login");
    }
    function login(Request $request){

        Session::flash('email',$request->email);

        $request->validate([
            'email'=>'required',
            'password'=> 'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::User()->status_user == 1){
                if(Auth::User()->role_id == 1){
                    return redirect('dashboard');
                }else if(Auth::User()->role_id == 2){
                    return redirect('pengawas');
                }else if(Auth::User()->role_id == 3){
                    return redirect('anggota');
                };
            }else{
                return redirect('home');
            }
        }else{
            return redirect('home');
        }
    }

    function logout(Request $request){
        Auth::logout();
        return redirect('home');
    }

    function create(Request $request){
        Session::flash('email',$request->email);
        Session::flash('nama',$request->nama);

        $request->validate([
            'reg_nama' => 'required',
            'reg_email'=>'required|email',
            'reg_password'=> 'required|min:6',
            'reg_con_password'=> 'required',
        ]);

        if($request->reg_password === $request->reg_con_password){

            $user = new User([
                'nama' => $request->reg_nama,
                'email' => $request->reg_email,
                'password' => Hash::make($request->reg_password),
                'role_id' => '3',
                'status_anggota' => '0',
                'status_user' => '0',
            ]);
            $user->save(); 
            return redirect('home');

        }else{
            return redirect('home');
        }
 
    }
}
