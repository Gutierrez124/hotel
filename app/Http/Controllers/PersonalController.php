<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Departamentos;
use App\Models\PersonalPagos;



class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Personal::all();
        return view('personal.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamentos=Departamentos::all();
        return view('personal.create',['departamentos'=>$departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Personal;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreArchivo = $foto->getClientOriginalName(); // Obtener el nombre original del archivo
            $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
            $foto->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada
        }

        $data->nombre_completo = $request->nombre_completo;
        $data->departamento_id = $request->departamento_id;
        $data->foto = 'vendor\adminlte\dist\img/' . $nombreArchivo; // Guardar la ruta de la imagen en la base de datos
        $data->bio = $request->bio;
        $data->tipo_salario = $request->tipo_salario;
        $data->salario_amt = $request->salario_amt;
        $data->save();

        return redirect('admin/personal/create')->with('success', 'Se han agregado datos.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Personal::find($id);
        return view('personal.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos=Departamentos::all();
        $data=Personal::find($id);
        return view('personal.edit',['data'=>$data,'departamentos'=>$departamentos]);
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
        $data = Personal::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Registro personal no encontrado.');
        }

        $nombreArchivo = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreArchivo = $foto->getClientOriginalName(); // Obtener el nombre original del archivo
            $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
            $foto->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada
        } else {
            $nombreArchivo = $request->prev_photo;
        }

        $data->nombre_completo = $request->nombre_completo;
        $data->bio = $request->bio;
        $data->tipo_salario = $request->tipo_salario;
        $data->salario_amt = $request->salario_amt;
        $data->foto = 'vendor\adminlte\dist\img/' . $nombreArchivo;
        $data->save();

        return redirect('admin/personal/'.$id.'/edit')->with('success', 'Los datos han sido actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal::where('id',$id)->delete();
        return redirect('admin/personal')->with('success','Los datos han sido eliminados.');
    }

    // All Payments
    function all_payments(Request $request,$personal_id){
        $data=PersonalPagos::where('personal_id',$personal_id)->get();
        $personal=Personal::find($personal_id);
        return view('personalpagos.index',['personal_id'=>$personal_id,'data'=>$data,'personal'=>$personal]);
    }

    // Add Payment
    function add_payment($personal_id){
        return view('personalpagos.create',['personal_id'=>$personal_id]);
    }

    function save_payment(Request $request,$personal_id){

        $data=new PersonalPagos;
        $data->personal_id=$personal_id;
        $data->cantidad=$request->cantidad;
        $data->fecha_pago=$request->cantidad_fecha;
        $data->save();

        return redirect('admin/personal/payment/'.$personal_id.'/add')->with('success','Se han agregado datos.');
    }

    public function delete_payment($id,$personal_id)
    {
        PersonalPagos::where('id',$id)->delete();
        return redirect('admin/personal/payments/'.$personal_id)->with('success','Los datos han sido eliminados.');
    }

}
