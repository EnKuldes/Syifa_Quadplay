<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _call extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dapros_id' , 'call_status_id', 'call_status_detail_id' , 'call_status_detail_reason_id' , 'call_am_datetime' , 'call_fu_datetime' , 'call_information' , 'call_agent_username' 
    ];
    // Relasi antara Tabel _call_status dengan _call || One To Many Relationship Inverse 
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

    // Relasi antara tabel Users dengan _call || One To Many Relationship Inverse  || Call Agent Username
    public function call_agent()
    {
    	return $this->belongsTo('App\User', 'call_agent_username');
    }
}
