<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\PeminjamanLab;
use App\Model\PeminjamanAlat;
use App\Model\Mahasiswa;
use App\Model\User;
use App\Model\Laboratorium;
use App\Model\Alat;

class dashController extends Controller
{
    public function index() {
        $datas    = PeminjamanLab::orderby('tgl_pinjam', 'desc')->paginate(5);
        $Palat    = PeminjamanAlat::orderby('id_pinjamA', 'desc')->paginate(5);
        $Talat    = Alat::select('*')->count();
        $Tmhs     = Mahasiswa::select('*')->count();
        $Tpinjam  = PeminjamanLab::select('*')->count();
        $Tlab     = Laboratorium::select('*')->count();

        return view('dashboard.dashboard')
                        ->with('datas',$datas)
                        ->with(compact('Palat'))
                        ->with(compact('Talat'))
                        ->with(compact('Tpinjam'))
                        ->with(compact('Tlab'))
                        ->with(compact('Tmhs'));
    }

    public function mahasiswa()
    {
        $username = session('username');
        $nama = User::where('username', $username)->first();
        $datas = PeminjamanLab::where('nama_peminjam', $nama->name)
                                ->orderby('tgl_pinjam', 'desc')
                                ->paginate(5);
        $alats = PeminjamanAlat::where('nama_peminjam', $nama->name)
                                ->orderby('tgl_pinjam', 'desc')
                                ->paginate(5);

        return view('dashboard.mahasiswa')
                    ->with(compact('alats'))
                    ->with('datas',$datas);
    }
}
