<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Laboratorium;
use App\Model\PeminjamanLab;

class pinjamLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('laboratorium.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Laboratorium::select('nama_lab')
                            ->where('id_lab',$id)
                            ->get();
        return view('laboratorium.peminjaman')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pinjam = new PeminjamanLab;
        $pinjam->nama_lab = $request->laboratorium;
        $pinjam->nama_peminjam = $request->peminjam;
        $pinjam->nim = $request->nim;
        $pinjam->keperluan = $request->keperluan;
        $pinjam->status = "proses";
        $pinjam->tgl_pinjam = date("Y-m-d");
        $pinjam->tgl_kembali = $request->tgl_kembali;
        $pinjam->jam_pinjam = date("h:i:s");
        $pinjam->jam_kembali = $request->jam_kembali;
        $pinjam->save();

        return redirect('/laboratorium');
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
