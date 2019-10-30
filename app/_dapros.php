<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _dapros extends Model
{
    // Relasi antara Tabel _dapros dengan _dapros_statistics || One To One Relationship  
    public function dapros_statistic()
    {
        return $this->hasOne('App\_dapros_statistics', 'dapros_id');
    }
}
