<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call_status extends Model
{
	# Relasi antara Tabel _call_status dengan _call_status_detaul || One To Many Relationship
    public function status_details()
    {
        return $this->hasMany('App\_call_status_detail', 'id_call_status', 'id');
    }
}
