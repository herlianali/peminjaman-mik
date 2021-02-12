<?php

namespace App\Http\Controllers;

use App\Model\Mahasiswa;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = DB::table('mahasiswa')
                    ->join('users', 'mahasiswa.id_user', '=', 'users.id')
                    ->select('mahasiswa.*', 'users.username')
                    ->latest()
                    ->paginate('5');
        return view('mahasiswa.index', compact('mhs'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DaftarLogin()
    {
        return view('login.daftarLogin');
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
            $id = User::select('id')->orderBy('id', 'Desc')->first();
            Mahasiswa::create([
                'id_user' => $id->id + 1,
                'nama'    => $request->nama,
                'nim'     => $request->nim,
                'kelas'   => $request->kelas,
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
        $mhs = DB::table('mahasiswa')
                    ->join('users', function($join) {
                        $join->on('mahasiswa.id_user', '=', 'users.id');
                    })
                    ->where('users.id', '=', $id)
                    ->first();
        return view('mahasiswa.edit', compact('mhs'));
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
        Mahasiswa::where('id_user', $id)
                 ->update([
                    'nama'  => $request->nama_mahasiswa,
                    'nim'   => $request->nim,
                    'kelas' => $request->kelas,
                 ]);

        User::where('id', $id)
            ->update([
                'name'     => $request->nama_mahasiswa,
                'username' => $request->username,
                'password' => md5($request->password),
            ]);

        return redirect()->route('mahasiswa.index')
                         ->with(['success' => 'Berhasil mengedit data Mahasiswa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::delete('id',$id);
        Mahasiswa::delete('id_user',$id);

        return redirect()->route('mahasiswa.index')
                         ->with(['success' => 'Berhasil dihapus']);
    }
}
