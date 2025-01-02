<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipohabitacion;
use App\Models\Testimonios;
use App\Models\Banners;



class HomeController extends Controller
{
    //
    public function home(){
        $banners=Banners::where('estado_publicación','on')->get();
        $tipohabitacion=Tipohabitacion::all();
        $testimonios=Testimonios::all();
        return View('home',['tipohabitacion'=>$tipohabitacion, 'testimonios'=>$testimonios,'banners'=>$banners]);
    }

    // Add Testimonios
    function add_testimonial(){
        return view('add-testimonial');
    }

    // Save Testimonios
    function save_testimonial(Request $request){
        $clienteid=session('data')[0]->id;
        $data=new Testimonios;
        $data->clientes_id=$clienteid;
        $data->testi_cont=$request->testi_cont;
        $data->save();

        return redirect('clientes/add-testimonial')->with('success','Se han agregado datos.');
    }
}
