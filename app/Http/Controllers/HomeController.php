<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use App\Subcategorias;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::orderBy('nombre', 'asc')->paginate(15);
        //$ondata = \DB::table('productos')->paginate(15);
        $categorias = Categorias::all();
        return view('home', compact('productos', 'categorias'));
        //return $productos;
    }
    public function categorias()
    {
    
        $categorias = Categorias::all();
        return view('categorias', compact('productos', 'categorias'));
    }
    
    public function subcategorias()
    {
        //$subcategorias = Subcategorias::all();   
        $subcategorias = Subcategorias::all(); 
       
     
         $nombre = Categorias::find(1)->nombre;
        $i=0;
         foreach ($subcategorias as $subcategoria) {
            $nombre = Categorias::find($subcategoria->idcategoria)->nombre;
            $subcategorias[$i]=array('id'=>$subcategoria->id, 'nombre'=>$nombre, 'subcategoria'=>$subcategoria->nombre);
            
             $i=$i+1;
            }
         return view('subcategorias', compact('subcategorias'));

    }
      public function productos($url)
    {
        $categoria = Categorias::where('url', $url)->select('id')->first();
        $productos=$categoria->productos;
        //$productos = Productos::where('idcategoria', $categoria->id)->orderBy('nombre', 'asc');
        //$categorias = Categorias::where('id', '=',  $categoria->id)->get();
       // $productos = Productos::where('idcategoria', $categoria->id)->get();
       // return response()->json($producto);
        return view('productos', compact('productos'));
        //return $categoria->productos;
    }

    public  function herramienta($id)
    {
        
        $producto = Productos::where('id', $id)
        ->orderBy('nombre', 'asc')
               ->first();
       return view('productos.show', compact('producto'));
       // return $producto;
    }
}
