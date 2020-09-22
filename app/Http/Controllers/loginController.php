<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function laborant()
    {
        return view('login.laborant');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = md5($request->password);
        $role     = $request->role;

        $user = User::select('*')->where('username', $username)
                                 ->where('password', $password)
                                 ->count();
        $laborant = "laborant";
        if ($user > 0) {
            if($role == 'laborant'){
                $session = $request->session()->put('username', "herlian");
                return redirect('/home')->with(compact($laborant))->with(compact($session));
            }elseif($role == 'mahasiswa') {
                return redirect('/mahasiswa');
            }
        }else{
            return redirect()->back();
        }

        
    }
}
 