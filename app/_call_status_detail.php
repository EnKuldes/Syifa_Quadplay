<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call_status_detail extends Model
{
    # Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'value_call_status_detail'];
	# Relasi antara Tabel _call_status_detaul dengan _call_status_detaul_reason || One To Many Relationship
    public function status_detail_reasons()
    {
        return $this->hasMany('App\_call_status_detail_reason', 'id_call_status_detail', 'id');
    }

    # Relasi antara Tabel _call_status dengan _call_status_detaul || One To Many Relationship Inverse 
    public function call_status()
    {
    	return $this->belongsTo('App\_call_status', 'id_call_status');
    }

    # Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_status_detail_id', 'id');
    }
    public function dapros_statistics_regional()
    {
        return $this->hasMany('App\_dapros_statistics_regional', 'call_status_detail_id', 'id');
    }
    
    # Relasi antara Tabel _call_status dengan _call || One To Many Relationship
    public function call()
    {
        return $this->hasMany('App\_call', 'call_status_detail_id', 'id');
    }
    public function call_regional()
    {
        return $this->hasMany('App\_call_regional', 'call_status_detail_id', 'id');
    }
}
