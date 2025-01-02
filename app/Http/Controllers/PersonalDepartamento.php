<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;


class PersonalDepartamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Departamentos::all();
        return view('departamento.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Departamentos;
        $data->titulo=$request->titulo;
        $data->detalle=$request->detalle;
        $data->save();

        return redirect('admin/departamento/create')->with('success','Se han agregado datos.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Departamentos::find($id);
        return view('departamento.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Departamentos::find($id);
        return view('departamento.edit',['data'=>$data]);
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
        $data=Departamentos::find($id);
        $data->titulo=$request->titulo;
        $data->detalle=$request->detalle;
        $data->save();

        return redirect('admin/departamento/'.$id.'/edit')->with('success','Los datos han sido actualizados.');
    }

    /**
     * Remove the specified resosurce from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamentos::where('id',$id)->delete();
       return redirect('admin/departamento')->with('success','Los datos han sido eliminados.');
    }
}
