<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipohabitacion;
use App\Models\Tiposhabitacionesimg;
use Illuminate\Support\Facades\Storage;


class TipoHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tipohabitacion::all();
        return view('tipohabitacion.index',['data' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipohabitacion.create');
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
            'titulo' => 'required',
            'precio' => 'required',
            'detalle' => 'required',
            'imgs.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:8000'
        ]);

        $data = new Tipohabitacion();
        $data->titulo = $request->titulo;
        $data->precio = $request->precio;
        $data->detalle = $request->detalle;

        $data->save();

        foreach ($request->file('imgs') as $img) {
            // Procesar y guardar la imagen
            $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
            $nombreArchivo = $img->getClientOriginalName(); // Obtener el nombre original del archivo
            $img->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada

            // Crear una nueva instancia de Tiposhabitacionesimg
            $imgData = new Tiposhabitacionesimg;
            $imgData->tipo_habitacion_id = $data->id;
            $imgData->img_src = 'vendor\adminlte\dist\img/' . $nombreArchivo; // Guardar la ruta de la imagen en la base de datos
            $imgData->img_alt = $nombreArchivo; // Guardar el nombre de la imagen
            $imgData->save();
        }

        return redirect('admin/tipohabitacion/create')->with('success', 'Se han agregado datos');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tipohabitacion::find($id);
        return view('tipohabitacion.show',['data' =>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tipohabitacion::find($id);
        return view('tipohabitacion.edit',['data' =>$data]);
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
            'titulo' => 'required',
            'precio' => 'required',
            'detalle' => 'required',
            'imgs.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8000'
        ]);

        $data = Tipohabitacion::find($id);
        $data->titulo = $request->titulo;
        $data->precio = $request->precio;
        $data->detalle = $request->detalle;

        $data->save();

        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $img) {
                // Procesar y guardar la imagen
                $nombreArchivo = $img->getClientOriginalName(); // Obtener el nombre original del archivo
                $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
                $img->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada

                // Crear una nueva instancia de Tiposhabitacionesimg
                $imgData = new Tiposhabitacionesimg;
                $imgData->tipo_habitacion_id = $data->id;
                $imgData->img_src = 'vendor\adminlte\dist\img/' . $nombreArchivo; // Guardar la ruta de la imagen en la base de datos
                $imgData->img_alt = $nombreArchivo; // Guardar el nombre de la imagen
                $imgData->save();
            }
        }

        return redirect('admin/tipohabitacion/'.$id.'/edit')->with('success', 'Los datos han sido actualizados');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipohabitacion::where('id',$id)->delete();
        return redirect('admin/tipohabitacion/')->with('success','Los datos han sido eliminados');
    }

    public function destroy_image($img_id){
        $data=Tiposhabitacionesimg::where('id',$img_id)->first();
        Storage::delete($data->img_src);

        Tiposhabitacionesimg::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);

    }
}
