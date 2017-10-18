<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $table='productos';

    public $fillable = ['nombre','url'];
    
   /* public function categorias()
	{
	return $this->belongsTo('App\Categorias');
	}*/
	public function categorias()
    {
    return $this->belongsToMany('App\Categorias','categoria_producto','idproducto','idcategoria');
    }
    public function subcategorias()
    {
    return $this->belongsToMany('App\Subcategorias');
    }
    public function subsubcategorias()
    {
    return $this->belongsToMany('App\Subsubcategorias');
    }
}
