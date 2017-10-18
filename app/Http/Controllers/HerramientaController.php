<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Productos;
use App\Categorias;
use App\Subcategorias;
use App\Subsubcategorias;

class HerramientaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($url)
    {
    	$producto = Productos::where('url', $url)
    	->orderBy('nombre', 'asc')
               ->take(10)
               ->get();
        //return view('home', compact('productos', 'categorias'));
        return response()->json($producto);
    }
    public function editar($id)
    {
        //$producto= Productos::find($id);
        $producto = Productos::findOrFail($id);
        $categorias=Categorias::all();
        $subcategorias=Subcategorias::all();
        $subsubcategorias=Subsubcategorias::all();
        //$idcategoria = DB::table('productos')->select('idcategoria')->where('id', $id)->first();
        //$idsubcategoria = DB::table('productos')->select('idsubcategoria')->where('id', $id)->get();
        //$idsubsubcategoria = DB::table('productos')->select('idsubsubcategoria')->where('id', $id)->get();
        //$categoria = DB::table('categorias')->select('nombre')->where('id', $idcategoria->idcategoria)->get();
        //$subcategoria = DB::table('subcategorias')->where('id', $idsubcategoria->idsubcategoria)->get();
        //$subsubcategoria = DB::table('subsubcategorias')->where('id', $idsubcategoria->idsubcategoria)->get();
        $info = array();
        
        foreach ($categorias as $item) {
            $info = array_add($info, $item->id, $item->nombre);
        }
         foreach ($producto->categorias as $item) {
            $borrar = array_pull($info, $item->id, $item->nombre);
        }

       // return $producto->subsubcategorias;
       return view('editar', compact('producto','categorias','categoria','subcategorias','subcategoria','subsubcategorias','info'));
      //return $idcategoria;
       // print_r($borrar);
    }

    public function nuevo()
    {
      # code...

      $categorias=Categorias::all();
      $subcategorias=Subcategorias::all();
      return view('productos.create',compact('categorias','subcategorias'));
    }
    public function store(Request $request)
    {
      # code...
      $input = $request->all();
       $producto = new Productos;
       $producto->nombre = $request->nombre;
       $producto->idcategoria = $request->idcategoria;
       $producto->idsubcategoria = $request->idsubcategoria;
       $producto->idsubsubcategoria = $request->idsubsubcategoria;
       $producto->url = urls_amigables($request->nombre);
       $producto->url_image = urls_amigables($request->nombre);
       $producto->resumen = $request->resumen;
       $producto->descripcion = $request->descripcion;
       $producto->ventajas = $request->ventajas;
       $producto->especificaciones = $request->especificaciones;
       $producto->save();

    //return redirect('/productos');
        return redirect('/productos');
    }

    public function posteditar(Request $request ,$id)
    {
        
        $file = $request -> file('url_image');
        if (!empty($file)) {
        $destinationPath = 'uploads/'.date("Y").'/'.date("m");
        $urlimage=urls_amigables($request->nombre).'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $urlimage);
        }

        $producto = Productos::find($id);
        $producto->nombre = $request->nombre;
        $producto->categorias()->sync($request->input('categoria'));
        $producto->subcategorias()->sync($request->input('subcategoria'));
        $producto->idsubsubcategoria = $request->subsubcategoria;
        $producto->resumen = $request->resumen;
        $producto->descripcion = $request->descripcion;
        $producto->ventajas = $request->ventajas;
        $producto->especificaciones = $request->especificaciones;
        if (!empty($file)) {
         $producto->url_image = 'https://admin.torquealto.com/'.$destinationPath.'/'.$urlimage;
        }
        $producto->save();

       return redirect('/productos');
       /*
      $input = $request->all();
      echo $file->getClientOriginalName();
      echo "<br>";
      echo $file->getClientOriginalExtension();
      echo "<br>";
      echo $file->getRealPath();
      echo "<br>";
      echo $file->getSize();
      echo $file->getMimeType(); */

      
    }
    public function borrar($id){
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return redirect('/productos');
    }
    public function destroy($id)
    {
    $producto = Productos::findOrFail($id);
    $producto->delete();
    return redirect('/productos')
    ->withSuccess("The '$producto->nombre' tag has been deleted.");
    }
}