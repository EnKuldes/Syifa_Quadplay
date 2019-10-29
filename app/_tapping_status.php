<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _tapping_status extends Model
{
	# Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'value_tapping_status'];
    # Relasi antara Tabel _tapping_status dengan _dapros_statistics || One To Many Relationship
    public function dapros_statistics()
    {
        return $this->hasMany('App\_dapros_statistics', 'tapping_status_id', 'id');
    }
}
