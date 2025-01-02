<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;


class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Banners::all();
        return view('banner.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            'alt_text'=>'required',
            'banner_src' => 'required|image|mimes:jpeg,png,jpg,gif|max:8000', // asegúrate de validar la imagen correctamente
        ]);

        $foto = $request->file('banner_src'); // obtener el archivo de la solicitud
        $rutaDestino = public_path('vendor\adminlte\dist\img'); // Ruta completa al directorio donde deseas guardar las imágenes
        $nombreArchivo = $foto->getClientOriginalName(); // Obtener el nombre original del archivo
        $foto->move($rutaDestino, $nombreArchivo); // Mover el archivo a la ruta de destino especificada

        $estadoPublicacion = $request->has('estado_publicación') ? 'on' : 'off';

        $data = new Banners();
        $data->banner_src = 'vendor\adminlte\dist\img/' . $nombreArchivo; // guardar la ruta de la imagen en la base de datos
        $data->alt_text = $request->input('alt_text');
        $data->estado_publicación = $estadoPublicacion;
        $data->save();

        return redirect('admin/banner/create')->with('success', 'Se han agregado datos.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Banners::find($id);
        return view('banner.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Banners::find($id);
        return view('banner.edit',['data'=>$data]);
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
            'alt_text' => 'required',
            'banner_src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8000',
        ]);

        $data = Banners::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Banner not found.');
        }

        $imgPath = $data->banner_src;

        if ($request->hasFile('banner_src')) {
            $foto = $request->file('banner_src');
            $rutaDestino = public_path('vendor\adminlte\dist\img');
            $nombreArchivo = $foto->getClientOriginalName();
            $foto->move($rutaDestino, $nombreArchivo);
            $imgPath = 'vendor\adminlte\dist\img/' . $nombreArchivo;
        }

        // Ajustar el estado de publicación
        $estadoPublicacion = $request->has('estado_publicación') ? 'on' : 'off';

        $data->banner_src = $imgPath;
        $data->alt_text = $request->alt_text;
        $data->estado_publicación = $estadoPublicacion;
        $data->save();

        return redirect('admin/banner/'.$id.'/edit')->with('success', 'Los datos han sido actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Banners::where('id',$id)->delete();
       return redirect('admin/banner')->with('success','Los datos han sido eliminados.');
    }
}
