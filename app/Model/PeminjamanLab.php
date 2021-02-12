<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeminjamanLab extends Model
{
    protected $table = 'peminjaman_lab';

    protected $fillable = [
    	'nama_lab',
    	'nama_peminjam',
    	'nim',
    	'keperluan',
		'status',
    	'tgl_pinjam',
    	'tgl_kembali',
    ];
}
