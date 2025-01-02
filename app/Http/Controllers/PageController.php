<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // About Us
    function about_us(){
        return view('about_us');
    }

    // Contact Us Form
    function contact_us(){
        return view('contact_us');
    }

    // Save Contact Us Form
    function save_contactus(Request $request){
        $request->validate([
            'nombre_completo'=>'required',
            'email'=>'required',
            'telefono'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name'=>$request->nombre_completo,
            'email'=>$request->email,
            'telefono'=>$request->telefono,
            'msg'=>$request->msg,
        );

        return redirect('page/contact-us')->with('success','Mail has been sent.');
    }
}

