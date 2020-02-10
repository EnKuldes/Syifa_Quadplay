<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _dapros extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'BRAND',
		'ROW_NUM',
		'MSISDN_MASK',
		'MSISDN',
		'NAME_MASK',
		'CUSTOMER_SUBTYPE',
		'TOT_BILL_AMOUNT',
		'TOTAL_REVENUE',
		'DEVICE_TYPE',
		'VOL_BROADBAND',
		'VOL_BROADBAND_PACKAGE',
		'CI',
		'KABUPATEN',
		'LONGITUDE',
		'LATITUDE',
		'ODP1',
		'ODP2',
		'ODP3',
    ];
    // Relasi antara Tabel _dapros dengan _dapros_statistics || One To One Relationship  
    public function dapros_statistic()
    {
        return $this->hasOne('App\_dapros_statistics', 'dapros_id');
    }
}
