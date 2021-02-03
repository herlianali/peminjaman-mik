<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    protected $fillable = [
    	'nama_alat',
    	'jumlah',
    	'keterangan',
    	'tempat',
    	'images',
    ];
    
}
