<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PeminjamanAlat;
use App\Model\Alat;
use App\Model\User;

class pinjamAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $username  = session('username');
        $user      = User::where('username', $username)->first();
        $peralatan = Alat::where('id_alat',$id)
                        ->first();
        return view('mahasiswa.alat.peminjamanAlat')
                    ->with(compact('peralatan'))
                    ->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alat'       => 'required',
            'peminjam'   => 'required',
            'keperluan'  => 'required',
            'jumlah'     => 'required|numeric',
            'tglPinjam'  => 'required|date',
            'tglKembali' => 'required|date',
        ]);
        
        $jumlah = Alat::where('nama_alat', $request->alat)->select('jumlah')->first();

        Alat::where('nama_alat', $request->alat)
            ->update([
                'jumlah' => $jumlah->jumlah - $request->jumlah,
            ]);

        PeminjamanAlat::create([
            'nama_alat'     => $request->alat,
            'nama_peminjam' => $request->peminjam,
            'keperluan'     => $request->keperluan,
            'jumlah'        => $request->jumlah,
            'status'        => 'Menunggu',
            'tgl_pinjam'    => $request->tglPinjam,
            'tgl_kembali'   => $request->tglKembali,
        ]);

        return redirect('/alatMahasiswa');
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

    public function status(Request $request, $id)
    {
        PeminjamanAlat::where('id_pinjamA', $id)
                    ->update([
                        'status' => $request->status,
                    ]);
        return redirect('/laborant/home')->with('success', 'Status Peminjaman Alat Telah Berubah');
    }

    public function pengembalian(Request $request, $id)
    {
        $jumlah = Alat::where('nama_alat', $request->alat)->first();

        Alat::where('nama_alat', $request->alat)
            ->update([
                'jumlah' => $request->jumlah + $jumlah->jumlah,
            ]);

        PeminjamanAlat::where('id_pinjamA', $id)
                    ->update([
                        'status' => $request->status,
                    ]);
                    
        return redirect('/laborant/home')->with('success', 'Status Peminjaman Alat Telah Berubah');
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
