<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Clientes::all();
        return view('clientes.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telefono' => 'required',
        ]);

        $nombreArchivo = null; // Inicializamos la variable $nombreArchivo

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreArchivo = $foto->getClientOriginalName(); // Obtener el nombre original del archivo
            $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
            $foto->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada
        }

        $data = new Clientes;
        $data->nombre_completo = $request->nombre_completo;
        $data->email = $request->email;
        $data->password = sha1($request->password);
        $data->telefono = $request->telefono;
        $data->direccion = $request->direccion;
        $data->foto = 'vendor\adminlte\dist\img/' . $nombreArchivo; // Guardar la ruta de la imagen en la base de datos
        $data->save();

        if ($request->form_type == 'form1') {
            return redirect('login')->with('success', 'Datos guardados correctamente.');
        } elseif ($request->form_type == 'form2') {
            return redirect('admin/clientes/create')->with('success', 'Datos guardados correctamente.');
        }

        // Redirección por defecto si no coincide ninguna acción específica
        return redirect('admin/clientes/create')->with('success', 'Datos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data=Clientes::find($id);
        return view('clientes.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=Clientes::find($id);
        return view('clientes.edit',['data'=>$data]);
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
        $request->validate([
            'nombre_completo' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        $nombreArchivo = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreArchivo = $foto->getClientOriginalName(); // Obtener el nombre original del archivo
            $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
            $foto->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada
        } else {
            $nombreArchivo = $request->prev_photo;
        }

        $data = Clientes::find($id);
        $data->nombre_completo = $request->nombre_completo;
        $data->email = $request->email;
        $data->telefono = $request->telefono;
        $data->direccion = $request->direccion;
        $data->foto = 'vendor\adminlte\dist\img/' . $nombreArchivo; // Guardar la ruta de la imagen en la base de datos
        $data->save();

        return redirect('admin/clientes/'.$id.'/edit')->with('success', 'Los datos han sido actualizados.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Clientes::where('id',$id)->delete();
        return redirect('admin/clientes')->with('success','Los datos han sido eliminados.');
    }


    // Login
    function login(){
        return view('frontlogin');
    }

    // Check Login
    function customer_login(Request $request){
        $email=$request->email;
        $pwd=sha1($request->password);
        $detalle=Clientes::where(['email'=>$email,'password'=>$pwd])->count();
        if($detalle>0){
            $detalle=Clientes::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detalle]);
            return redirect('/');
        }else{
            return redirect('login')->with('error','Correo electrónico/contraseña no válida!!');
        }
    }



    // register
    function register(){
        return view('register');
    }

    function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }
}
