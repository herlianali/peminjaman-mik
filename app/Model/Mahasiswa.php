<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
    	'nim',
    	'id_user',
    	'nama',
    	'kelas',
    ];
}
