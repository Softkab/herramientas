<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsubcategorias;
use App\Productos;

class SubsubcategoriaController extends Controller
{
    //
     public function index($url)
    {
        header('Access-Control-Allow-Origin: *');
    	$subsubcategoria = Subsubcategorias::where('url', $url)->select('id')->first();
        $producto = Productos::where('idsubsubcategoria', $subsubcategoria->id)
    	->orderBy('nombre', 'asc')
               ->get();
        return response()->json($producto);
    }
}
