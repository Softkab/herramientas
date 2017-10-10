<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    //
	protected $tables='subcategorias';

    public function categorias()
	{
	return $this->belongsTo('App\Categorias');
	}
}
