<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PeminjamanLab;
use App\Model\Mahasiswa;
use App\Model\Laboratorium;
use App\Model\Alat;

class dashController extends Controller
{
    public function index() {
        $datas = PeminjamanLab::orderby('tgl_pinjam', 'desc')->paginate(5);
        $Talat = Alat::select('*')->count();

        return view('dashboard.dashboard')->with('datas',$datas)->with(compact('Talat'));
    }

    public function mahasiswa()
    {
        $datas = PeminjamanLab::orderby('tgl_pinjam', 'desc')->paginate(5);
        return view('dashboard.mahasiswa')->with('datas',$datas);
    }
}
