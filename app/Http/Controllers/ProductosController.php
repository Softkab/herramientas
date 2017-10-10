<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    /** @var  ProductosRepository */
    private $productosRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Productos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = Productos::paginate(15);
        

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Productos.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created Productos in storage.
     *
     * @param CreateProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateProductosRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);

        Flash::success('Productos saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
    
        $productos = Productos::where('id', $id)
               ->first();
        if (empty($productos)) {

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified Productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productos = Productos::where('id', $id)
               ->first();

        if (empty($productos)) {
            

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('productos', $productos);
    }

    /**
     * Update the specified Productos in storage.
     *
     * @param  int              $id
     * @param UpdateProductosRequest $request
     *
     * @return Response
     */
    public function update(Request $request ,$id)
    {
        $file = $request -> file('url_image');
        if (!empty($file)) {
        $destinationPath = 'uploads/'.date("Y").'/'.date("m");
        $urlimage=urls_amigables($request->nombre).'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $urlimage);
        }

        $productos = Productos::find($id);

        if (empty($productos)) {
           

            return redirect(route('productos.index'));
        }

        $productos->nombre = $request->nombre;
        $productos->resumen = $request->resumen;
        $productos->descripcion = $request->descripcion;
        $productos->ventajas = $request->ventajas;
        $productos->especificaciones = $request->especificaciones;
        if (!empty($file)) {
         $productos->url_image = 'http://admin.torquealto.com/'.$destinationPath.'/'.$urlimage;
        }
        $productos->save();

       return redirect('/productos');
        

        

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Productos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productos = $this->productosRepository->findWithoutFail($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $this->productosRepository->delete($id);

        Flash::success('Productos deleted successfully.');

        return redirect(route('productos.index'));
    }
}
