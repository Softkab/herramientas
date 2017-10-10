<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;

class CategoriasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	# code...
    	$categorias = Categorias::all();
        return view('categorias', compact('productos', 'categorias'));
    }
    public function create()
    {
    	# code...
        
        return view('categorias.create');
    }
    public function show($id)
    {
    	# code...
        return $id;
    }
   public function update(Request $request, $id)
    {
        $file = $request -> file('url_image');
        if (!empty($file)) {
        $destinationPath = 'uploads/'.date("Y").'/'.date("m");
        $urlimage=urls_amigables($request->nombre).'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $urlimage);
        }

        $categoria = Categorias::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->url = urls_amigables($request->nombre);
        if (!empty($file)) {
         $categoria->url_image = 'https://admin.torquealto.com/'.$destinationPath.'/'.$urlimage;
        }
        $categoria->save();
        return redirect('/categorias');
    }
    public function edit($id)
    {
        # code...
        $categorias = Categorias::where('id', $id)
               ->first();
        return view('categorias.edit', compact('categorias'));       
    }
    public function store(Request $request)
    {
    // Validate and store the blog post...
        $categoria = new Categorias;
        $categoria->nombre = $request->nombre;
        $categoria->url = urls_amigables($request->nombre);
        $categoria->save();
        return redirect('/categorias');
    }
}
