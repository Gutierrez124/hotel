<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Productos::all();
        return view('productos.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Productos();
        $data->nombre=$request->nombre;
        $data->precio=$request->precio;
        $data->descripcion=$request->descripcion;
        $data->stock=$request->stock;
        $data->save();

        return redirect('admin/productos/create')->with('success','Se han agregado datos.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Productos::find($id);
        return view('productos.edit',['data' =>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Productos::find($id);
        $data->nombre=$request->nombre;
        $data->precio=$request->precio;
        $data->descripcion=$request->descripcion;
        $data->stock=$request->stock;
        $data->save();

        return redirect('admin/productos/'.$id.'/edit')->with('success','Los datos han sido actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Productos::where('id',$id)->delete();
        return redirect('admin/productos/')->with('success','Los datos han sido eliminados');
    }
}
