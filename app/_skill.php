<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _skill extends Model
{
	# Hanya menampilkan dua value penting dari tabel
    protected $visible = ['id', 'skill_desc'];
    public function call_status()
    {
        //return $this->hasMany('App\_call_status_detail', 'id_call_status', 'id');
        return $this->hasMany('App\_call_status', 'id_skill', 'id');
    }
}
