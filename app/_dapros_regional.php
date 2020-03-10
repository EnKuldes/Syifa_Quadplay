<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _dapros_regional extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pots',
		'witel',
		'nama_customer',
		'klasifikasi_revenue',
		'prioritas_1',
		'prioritas_2',
		'prioritas_3',
    ];
    // Relasi antara Tabel _dapros dengan _dapros_statistics || One To One Relationship  
    public function dapros_statistic()
    {
        return $this->hasOne('App\_dapros_statistics_regional', 'dapros_id');
    }
}
