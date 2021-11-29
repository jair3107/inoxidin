<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos'] = Productos::paginate(100);

        return view('productos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Precio' => 'required|numeric|max:100000',
            'Cantidad' => 'required|numeric|max:1000',
            'Descripcion' => 'required|string|max:100',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $Mensaje=['required'=>'El :attribute es requerido', 'Foto.required'=>'La foto es requerida' ];

        $this->validate($request, $campos, $Mensaje);

        $datosProductos = request()->except('_token');

        if ($request->hasFile('Foto')) {
            $datosProductos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Productos::insert($datosProductos);

        return redirect('productos')->with('Mensaje','Producto agregado con exito');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Productos::findOrFail($id);

        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Precio' => 'required|numeric|max:100000',
            'Cantidad' => 'required|numeric|max:1000',
            'Descripcion' => 'required|string|max:100',
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        if ($request->hasFile('Foto')) {
            $campos=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $Mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $Mensaje);


        $datosProductos = request()->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $producto = Productos::findOrFail($id);

            Storage::delete(['public/' . $producto->Foto]);

            $datosProductos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Productos::where('id', '=', $id)->update($datosProductos);

        return redirect('productos')->with('Mensaje','Producto modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $producto = Productos::findOrFail($id);

        if (Storage::delete(['public/' . $producto->Foto])) {
            Productos::destroy($id);

        }

        
        return redirect('productos')->with('Mensaje','Producto eliminado con exito');
    }
}
