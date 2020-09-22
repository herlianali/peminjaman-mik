<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PeminjamanLab;

class dashController extends Controller
{
    public function index() {
        $datas = PeminjamanLab::orderby('tgl_pinjam', 'desc')->paginate(5);

        return view('dashboard.dashboard')->with('datas',$datas);
    }

    public function mahasiswa()
    {
        $datas = PeminjamanLab::orderby('tgl_pinjam', 'desc')->paginate(5);
        return view('dashboard.mahasiswa')->with('datas',$datas);
    }
}
