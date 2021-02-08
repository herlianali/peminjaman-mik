<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class loginController extends Controller
{
    public function index()
    {
        return view('login.mahasiswa');
    }

    public function laborant()
    {
        return view('login.laborant');
    }

    public function loginLaborant(Request $request)
    {

        $user = User::where('username', $request->username)
                    ->where('password', md5($request->password))
                    ->first();

        if ($user != null) {
            if ($user['role'] == 'laborant') {
                session([
                    'login'    => true,
                    'username' => $user['username'],
                    'role'     => $user['role'],
                ]);
                return redirect('/laborant/home');
            }else{
                return redirect('/laborant')->with('pesan', "Username Atau Password Salah");
            }
        }else{
            return redirect('/laborant')->with('pesan', "Username Atau Password Salah");
        }
        
    }

    public function loginUser(Request $request)
    {

        $user = User::where('username', $request->username)
                    ->where('password', md5($request->password))
                    ->first();

        if ($user != null && $user['role'] == 'mahasiswa') {
            $session = $request->session()
                            ->put([
                                'login'    => true,
                                'username' => $user['username'],
                                'role'     => $user['role'],
                            ]);
            return redirect('/dashboard')->with(compact('session'));
        }else{
            return redirect('/')->with('pesan', "Username Atau Password Salah");
        }
        
    }

    public function logout()
    {
        session_unset();
        return redirect('/');
    }
}
 