<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Productos;

class ProductoController extends Controller
{
    //


    public function index($id)
    {
    	header('Access-Control-Allow-Origin: *'); 
    	$producto = Productos::where('id', $id)
               ->first();
        //return view('home', compact('productos', 'categorias'));
        return $producto;

    }
    public function nombre($url)
    {
    	header('Access-Control-Allow-Origin: *'); 
    	$producto = Productos::where('url', $url)
               ->first();
        //return view('home', compact('productos', 'categorias'));
        return $producto;

    }
}
