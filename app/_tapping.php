<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _tapping extends Model
{
    // Relasi antara Tabel _tapping_status dengan _tapping || One To Many Relationship Inverse 
    public function tapping_status()
    {
    	return $this->belongsTo('App\_tapping_status', 'tapping_status_id');
    }
    // Relasi antara Tabel Users dengan _tapping || One To Many Relationship Inverse 
    public function tapping_agent()
    {
    	return $this->belongsTo('App\User', 'tapping_agent_username');
    }
}
