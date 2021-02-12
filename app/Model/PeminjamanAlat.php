<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeminjamanAlat extends Model
{
    protected $table = 'peminjaman_alat';

    protected $fillable = [
    	'nama_alat',
    	'nama_peminjam',
    	'keperluan',
		'jumlah',
		'status',
    	'tgl_pinjam',
    	'tgl_kembali',
    ];
}
