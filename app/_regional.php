<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _regional extends Model
{
    # Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'regional_desc'];
    # Relasi antara Tabel _call_status_detaul dengan _call_status_detaul_reason || One To Many Relationship
    public function witels()
    {
        return $this->hasMany('App\_witel', 'id_regional', 'id');
    }
    # Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_regional', 'id');
    }
    public function dapros_statistics_regional()
    {
        return $this->hasMany('App\_dapros_statistics_regional', 'call_regional', 'id');
    }
    
    # Relasi antara Tabel _call_status dengan _call || One To Many Relationship
    public function call()
    {
        return $this->hasMany('App\_call', 'call_regional', 'id');
    }
    public function call_regional()
    {
        return $this->hasMany('App\_call_regional', 'call_regional', 'id');
    }
}
