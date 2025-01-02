@extends('frontlayout')
@section('content')
<div class="container-fluid p-0 position-relative">
    <div style="position: relative; height: 450px;">
        <img src="https://imgcom.masterd.es/49/blog/2023/02/42474.jpg" alt="Imagen de nuestro hotel" class="img-fluid w-100" style="height: 100%;">
        <div class="position-absolute bottom-0 start-0 text-left" style="width: 100%;">
            <h3 class="text-white" style="background-color: rgba(0, 0, 0, 0); padding: 60px; font-weight: bold; margin-left: 20px;">Registro de Usuario</h3>
            <div style="color: #FF9900; padding: 0px; position: absolute; bottom: 30px; left: 110px;">
                Inicio <a href="http://127.0.0.1:8000/" style="color: white; text-decoration: none;">/ Registro</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-4" style="max-width: 1000px">
    <div class="card">
        <div class="card-header bg-white text-dark">
            <h3 class="mb-0">Registro</h3> <!-- Cambiado el título del formulario -->
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <form method="post" action="{{url('admin/clientes')}}">
                @csrf
                <input type="hidden" name="form_type" value="form1">
                <div class="form-group row">
                    <label for="nombre_completo" class="col-sm-3 col-form-label" style="color: #6FA8DC;">Nombre Completo<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input required type="text" class="form-control" name="nombre_completo" id="nombre_completo"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label" style="color: #6FA8DC;">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input required type="email" class="form-control" name="email" id="email"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label" style="color: #6FA8DC;">Password<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input required type="password" class="form-control" name="password" id="password"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefono" class="col-sm-3 col-form-label" style="color: #6FA8DC;">Teléfono<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input required type="number" class="form-control" name="telefono" id="telefono"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="direccion" class="col-sm-3 col-form-label" style="color: #6FA8DC;">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="direccion" id="direccion"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style="margin-right: 0px;">
                            <label class="form-check-label" for="terminos_condiciones" style="color: #7c7c7c;">Estoy de acuerdo con los términos y condiciones así como con la política de protección de datos.<span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary right" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Menu Final Joseph -->
<div style="background-color: #1d1c1c; height: 190px; width: 100%; display: flex; align-items: center;">

    <!-- Sección izquierda -->
    <div style="flex: 1;">
        <div style="padding-left: 180px; color: white;">
            <div style="margin-bottom: 5px;">
                <a href="http://127.0.0.1:8000/" style="color: white; text-decoration: none; margin-bottom: 10px;">Inicio</a><br>
                <a href="http://127.0.0.1:8000/page/about-us" style="color: white; text-decoration: none; margin-bottom: 10px;">Sobre Nosotros</a><br>
                <a href="http://127.0.0.1:8000/page/contact-us" style="color: white; text-decoration: none; margin-bottom: 10px;">Contacta con Nosotros</a><br>
                <a href="http://127.0.0.1:8000/register" style="color: #FF9900; text-decoration: none; margin-bottom: 10px;">Registro</a><br>
                <a href="http://127.0.0.1:8000/login" style="color: white; text-decoration: none;">Acceso</a><br>
            </div>
        </div>
    </div>

    <!-- Sección central -->
    <div style="flex: 1;">
        <div style="text-align: center; color: white;">
            <p style="font-weight: bold; margin-bottom: 5px; font-size: 24px;">Hotel Jupiter</p>
            <p style="color: #FF9900; margin-bottom: 5px;">H&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;E&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;U&nbsp;&nbsp;I&nbsp;&nbsp;T&nbsp;&nbsp;E&nbsp;&nbsp;S</p>

            <p style="margin-bottom: 10px;">
                <i class="fas fa-map-marker-alt" style="color: white;"></i> Av. Larco 566. Trujillo - Perú |
                <i class="fas fa-phone" style="color: white;"></i> +51 948421842
            </p>
            <a href="url_facebook" style="color: white; text-decoration: none; margin-right: 20px;"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/joseph.arroyo08?igsh=eWt0MHhxY3AzazFi" style="color: white; text-decoration: none;"><i class="fab fa-instagram"></i></a>

        </div>
    </div>

    <!-- Sección derecha -->
    <div style="flex: 1;">
        <div style="padding-left: 90px; color: white; padding-right: 70px;">
            <p style="color: #FF9900; margin-bottom: 5px; ">O&nbsp;F&nbsp;E&nbsp;R&nbsp;T&nbsp;A&nbsp;S</p>
            <p style="margin-bottom: 5px; font-weight: bold;">Suscríbase para recibir</p>
            <p style="margin-bottom: 10px; font-weight: bold;">noticias y ofertas</p>
            <form action="url_de_suscripcion" method="post" style="display: flex; align-items: center;">
                <input type="email" name="email" placeholder="Correo electrónico" style="padding: 5px; border: 1px solid white; width: 250px;">
                <button type="submit" style="background-color: white; color: #1d1c1c; padding: 6px; border: none;">
                    <i class="fas fa-envelope"></i>
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
