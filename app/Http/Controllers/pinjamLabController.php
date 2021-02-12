<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Laboratorium;
use App\Model\User;
use App\Model\Mahasiswa;
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
        return view('laboratorium.peminjaman')
                    ->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekLab = PeminjamanLab::where('nama_lab', $request->namaLab)
                              ->where('nim', $request->nim)
                              ->first();

        if ($cekLab['status'] == 'Menunggu') {
            return redirect('/labMahasiswa')->with('Pesan', 'Lab Masih Terpinjam');
        }else{
            $pinjam = new PeminjamanLab;
            $pinjam->nama_lab = $request->namaLab;
            $pinjam->nama_peminjam = $request->namaPeminjam;
            $pinjam->nim = $request->nim;
            $pinjam->keperluan = $request->keperluan;   
            $pinjam->status = "Menunggu";
            $pinjam->tgl_pinjam = $request->tglPinjam;
            $pinjam->tgl_kembali = $request->tglSelesai;
            $pinjam->save();

            return redirect('/labMahasiswa');
        }
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
        PeminjamanLab::where('id_pinjamL', $id)
                    ->update([
                        'status' => $request->status,
                    ]);
                    
        return redirect('/laborant/home')->with('success', 'Status Peminjaman Lab Telah Berubah');
    }

    public function pengembalian(Request $request, $id)
    {
        PeminjamanLab::where('id_pinjamL', $id)
                    ->update([
                        'status' => $request->status,
                    ]);
                    
        return redirect('/laborant/home')->with('success', 'Status Peminjaman Lab Telah Berubah');
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
