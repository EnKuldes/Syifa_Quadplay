<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _paket extends Model
{
    # Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'paket_desc'];
    # Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_paket', 'id');
    }
    
    # Relasi antara Tabel _call_status dengan _call || One To Many Relationship
    public function call()
    {
        return $this->hasMany('App\_call', 'call_paket', 'id');
    }
}
