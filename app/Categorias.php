<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
	protected $tables='categorias';

    public function subcategorias()
	{
	return $this->hasMany('App\Subcategorias');
	}
	public function productos()
    {
    return $this->belongsToMany('App\Productos','categoria_producto','idcategoria','idproducto');
    }
}
