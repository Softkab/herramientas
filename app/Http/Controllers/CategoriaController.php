<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Productos;
use App\Categorias;

class CategoriaController extends Controller
{
    //
     public function index($url)
    {
        header('Access-Control-Allow-Origin: *');
        $categoria = Categorias::where('url', $url)->select('id')->first();
        $producto = Productos::where('idcategoria', $categoria->id)
        ->orderBy('nombre', 'asc')
               ->get();
        return response()->json($categoria->productos);
    }
      public function ultimas()
    {
        header('Access-Control-Allow-Origin: *');
    
        //$producto =Productos::orderBy('updated_at', 'desc')->paginate(20);
        $producto = DB::table('productos')
                    ->where('idcategoria', '<', 25)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(20);
        return response()->json($producto);
    }
    public function categoriasjson()
    {
        header('Access-Control-Allow-Origin: *'); 
        $categorias = Categorias::where('Especial','=','0')->orderBy('nombre', 'asc')->get();
        return $categorias;
    }
  
}
