<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _witel extends Model
{
    # Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'witel_desc'];
    # Relasi antara Tabel _call_status dengan _call_status_detaul || One To Many Relationship Inverse 
    public function regional()
    {
    	return $this->belongsTo('App\_regional', 'id_regional');
    }
    # Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_witel', 'id');
    }
    
    # Relasi antara Tabel _call_status dengan _call || One To Many Relationship
    public function call()
    {
        return $this->hasMany('App\_call', 'call_witel', 'id');
    }
}
