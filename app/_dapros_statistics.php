<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _dapros_statistics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dapros_id', 'call_status_id' , 'call_status_detail_id' , 'call_status_detail_reason_id' , 'call_am_datetime' , 'call_fu_datetime' , 'call_information' , 'call_agent_username'
        , 'tapping_status_id' , 'tapping_information' , 'tapping_agent_username', 'tapping_consume_datetime' 
        , 'call_consume_datetime', 'call_attempts'
        , 'ever_be_returned', 'data_condition'
        , 'call_input_k_kontak', 'call_input_cp_marshanda', 'call_input_an_pemasangan', 'call_regional', 'call_witel', 'call_paket', 'call_alamat_pemasangan', 'call_email', 'call_via_by'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        # Empty
    ];

    // Relasi antara Tabel _call_status dengan _dapros_statistics || One To Many Relationship Inverse 
    public function call_status()
    {
    	return $this->belongsTo('App\_call_status', 'call_status_id');
    }
    public function call_status_detail()
    {
    	return $this->belongsTo('App\_call_status_detail', 'call_status_detail_id');
    }
    public function call_status_detail_reason()
    {
    	return $this->belongsTo('App\_call_status_detail_reason', 'call_status_detail_reason_id');
    }

    // Relasi antara tabel Users dengan _dapros_statistics || One To Many Relationship Inverse  || Call Agent Username
    public function call_agent()
    {
    	return $this->belongsTo('App\User', 'call_agent_username', 'username');
    }

    // Relasi antara tabel Users dengan _dapros_statistics || One To Many Relationship Inverse  || Tapping Agent Username
    public function tapping_agent()
    {
    	return $this->belongsTo('App\User', 'tapping_agent_username', 'username');
    }//

    // Relasi antara tabel _tapping_status dengan _dapros_statistics || One To Many Relationship Inverse 
    public function tapping_status()
    {
    	return $this->belongsTo('App\_tapping_status', 'tapping_status_id');
    }

    // Relasi antara Tabel _dapros dengan _dapros_statistics || One To One Relationship Inverse 
    public function dapros()
    {
        return $this->belongsTo('App\_dapros', 'dapros_id');
    }

    // Relasi antara Tabel _regional dan _witel dengan _dapros_statistics || One To Many Relationship Inverse 
    public function regional()
    {
        return $this->belongsTo('App\_regional', 'call_regional');
    }
    public function witel()
    {
        return $this->belongsTo('App\_witel', 'call_witel');
    }
    public function paket()
    {
        return $this->belongsTo('App\_paket', 'call_paket');
    }
}
