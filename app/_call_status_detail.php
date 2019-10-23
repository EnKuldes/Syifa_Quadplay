<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call_status_detail extends Model
{
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
}
