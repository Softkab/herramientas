<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategorias;
use App\Categorias;

class SubcategoriasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	  //$subcategorias = Subcategorias::all();   
        $subcategorias = Subcategorias::all(); 
       
     
         $nombre = Categorias::find(1)->nombre;
        $i=0;
         foreach ($subcategorias as $subcategoria) {
            $nombre = Categorias::find($subcategoria->idcategoria)->nombre;
            $subcategorias[$i]=array('id'=>$subcategoria->id, 'nombre'=>$nombre, 'subcategoria'=>$subcategoria->nombre, 'url'=>$subcategoria->url);
            
             $i=$i+1;
            }
         return view('subcategorias', compact('subcategorias'));
    }
    public function create()
    {
    	# code...
    	$categorias=Categorias::all();
        return view('subcategorias.create', compact('categorias'));
    }
    public function store(Request $request)
    {
    // Validate and store the blog post...
        $subcategoria = new Subcategorias;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->url = urls_amigables($request->nombre);
        $subcategoria->idcategoria = $request->categoria;
        $subcategoria->save();
        return redirect('/subcategorias');
    }
     public function edit($id)
    {
        # code...
        $categorias=Categorias::all();
        $subcategorias = Subcategorias::where('id', $id)
               ->first();
        return view('subcategorias.edit', compact('subcategorias','categorias'));       
    }
    public function update(Request $request, $id)
    {
        $subcategoria = Subcategorias::find($id);
        $subcategoria->nombre = $request->nombre;
        $subcategoria->url = urls_amigables($request->nombre);
        $subcategoria->idcategoria = $request->categoria;
        $subcategoria->save();
        return redirect('/subcategorias');
    }
}
