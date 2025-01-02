<?php

namespace App\Http\Controllers;

use App\Models\Habitaciones;
use App\Models\Tipohabitacion;
use Illuminate\Http\Request;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Habitaciones::all();
        return view('habitaciones.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipohabitacion=Tipohabitacion::all();
        return view('habitaciones.create',['tipohabitacion'=>$tipohabitacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Habitaciones;
        $data->tipo_habitacion_id=$request->rt_id;
        $data->titulo=$request->titulo;
        $data->save();

        return redirect('admin/habitaciones/create')->with('success','Se han agregado datos.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Habitaciones::find($id);
        return view('habitaciones.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipohabitacion=Tipohabitacion::all();
        $data=Habitaciones::find($id);
        return view('habitaciones.edit',['data'=>$data,'tipohabitacion'=>$tipohabitacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Habitaciones::find($id);
        $data->tipo_habitacion_id=$request->rt_id;
        $data->titulo=$request->titulo;
        $data->save();

        return redirect('admin/habitaciones/'.$id.'/edit')->with('success','Los datos han sido actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Habitaciones::where('id',$id)->delete();
        return redirect('admin/habitaciones')->with('success','Los datos han sido eliminados.');
    }
}
