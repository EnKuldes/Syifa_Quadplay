<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call_status_detail_reason extends Model
{
    # Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'value_call_status_detail_reason'];
    // Relasi antara Tabel _call_status_detaul dengan _call_status_detaul_reason || One To Many Relationship Inverse 
    public function call_status_detail()
    {
    	return $this->belongsTo('App\_call_status_detail', 'id_call_status_detail');
    }

    # Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_status_detail_reason_id', 'id');
    }
    
    # Relasi antara Tabel _call_status dengan _call || One To Many Relationship
    public function call()
    {
        return $this->hasMany('App\_call', 'call_status_detail_reason_id', 'id');
    }
}
