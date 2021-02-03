<?php

namespace App\Http\Controllers;

use App\Model\Mahasiswa;
use App\Model\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function DaftarLogin()
    {
        return view('mahasiswa.DaftarLogin');
    }

    public function storeInLogin(Request $request)
    {
        $request->validate([
            'nama'     =>'required',
            'username' =>'required',
            'password' =>'required',
            'nim'      =>'required',
            'kelas'    =>'required',
        ]);

        $cekNim = Mahasiswa::select('nim')
                           ->where('nim', $request->nim)
                           ->get()
                           ->count();

        if ($cekNim != 0) {
            return redirect('/mahasiswaDaftar')->with('pesan', 'nim sudah pernah didaftarkan');
        }else{
            Mahasiswa::create([
                'nama'  => $request->nama,
                'nim'   => $request->nim,
                'kelas' => $request->kelas,
            ]);

            User::create([
                'name'     => $request->nama,
                'username' => $request->username,
                'password' => md5($request->password),
                'role'     => $request->role,
            ]);
        }

        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
