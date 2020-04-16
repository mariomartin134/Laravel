<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subak extends Model
{
    //
    public $timestamps = false;
    protected $table='anggota';
    protected $primarykey='id_subak';
    protected $fillable=[
        'nama_anggota','no_telp','alamat_anggota',
    ];
}
