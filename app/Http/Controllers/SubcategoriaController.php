<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategorias;
use App\Productos;

class SubcategoriaController extends Controller
{
    //
     public function index($url)
    {
        header('Access-Control-Allow-Origin: *');
    	$subcategoria = Subcategorias::where('url', $url)->select('id')->first();
        $producto = Productos::where('idsubcategoria', $subcategoria->id)
    	->orderBy('nombre', 'asc')
               ->get();
        return response()->json($producto);
    }
}
