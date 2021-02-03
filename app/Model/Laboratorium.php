<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';

    protected $fillable = [
    	'nama_lab',
    	'aslab',
    	'kapasitas',
    	'fasilitas',
    	'foto',
    ];
}
