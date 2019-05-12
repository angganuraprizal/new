<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['kategori_id', 'user_id', 'judul', 'isi'];
    public $timestamp = true;

    public function kategori(){
		return $this->belongsTo('App\Kategori', 'kategori_id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
