<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call_status_detail_reason extends Model
{
    // Relasi antara Tabel _call_status_detaul dengan _call_status_detaul_reason || One To Many Relationship Inverse 
    public function call_status_detail()
    {
    	return $this->belongsTo('App\_call_status_detail', 'id_call_status_detail');
    }
}
