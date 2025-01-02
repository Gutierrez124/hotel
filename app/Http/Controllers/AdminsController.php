<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Reservas;
use App\Models\Testimonios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie as FacadesCookie;

class AdminsController extends Controller
{
    // Login
    function login(){
        return view('login');
    }

    function check_login(Request $request){

        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $admin=Admins::where(['username'=>$request->username,'password'=>($request->password)])->count();

        if($admin>0){
            $adminData=Admins::where(['username'=>$request->username,'password'=>($request->password)])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){
                FacadesCookie::queue('adminuser',$request->username,1440);
                FacadesCookie::queue('adminpwd',$request->password,1440);
            }

            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Correo electrónico/contraseña no válida!!
            ');
        }
    }

    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    function dashboard(){
        $bookings=Reservas::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking){
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }


        return view('deshbord',['labels'=>$labels,'data'=>$data]);

    }

    public function testimonials()
    {
        $data=Testimonios::all();
        return view('admin_testimonials',['data'=>$data]);
    }

    public function destroy_testimonial($id)
    {
        Testimonios::where('id',$id)->delete();
        return redirect('admin/testimonials')->with('success','Los datos han sido eliminados.');
    }
}
