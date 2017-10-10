<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsubcategorias;
use App\Subcategorias;
use App\Categorias;

class SubsubcategoriasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$subsubcategorias = Subsubcategorias::all(); 
       
     
         $nombre = Categorias::find(1)->nombre;
         $subcategoria = Subcategorias::find(1)->nombre;
        $i=0;
         foreach ($subsubcategorias as $subsubcategoria) {
            $nombre = Categorias::find($subsubcategoria->idcategoria)->nombre;
            $subcategoria = Subcategorias::find($subsubcategoria->idsubcategoria)->nombre;
            $subsubcategorias[$i]=array('id'=>$subsubcategoria->id, 'nombre'=>$nombre, 'subsubcategoria'=>$subsubcategoria->nombre, 'url'=>$subsubcategoria->url, 'subcategoria'=>$subcategoria);
            
             $i=$i+1;
            }
         // return $subsubcategorias;
    	return view('subsubcategorias',  compact('subsubcategorias'));
    }
    public function create()
    {
    
    	$categorias=Categorias::all();
    	$subcategorias=Subcategorias::all();
        return view('subsubcategorias.create', compact('categorias','subcategorias'));
    }
    public function store(Request $request)
    {
    	
    	$subsubcategoria = new Subsubcategorias;
        $subsubcategoria->nombre = $request->nombre;
        $subsubcategoria->url = urls_amigables($request->nombre);
        $subsubcategoria->idcategoria = $request->categoria;
        $subsubcategoria->idsubcategoria = $request->subcategoria;
        $subsubcategoria->save();
        return redirect('/subsubcategorias');
    }
    public function edit($id)
    {
        $categorias=Categorias::all();
    	$subcategorias=Subcategorias::all();
    	$subsubcategorias = Subsubcategorias::where('id', $id)
               ->first();
    	 return view('subsubcategorias.edit', compact('subsubcategorias','subcategorias','categorias'));
    }
}
