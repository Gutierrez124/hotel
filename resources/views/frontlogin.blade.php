@extends('frontlayout')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-6 position-relative">
            <div class="overlay"></div>
            <img src="https://media.istockphoto.com/id/1335061100/photo/female-hotel-receptionist-assisting-businessman-for-checking-in.jpg?s=612x612&w=0&k=20&c=N1O7hblGqvzW_Bq93JXjSnb9fIjosNvyQKwLMirUjtk=" alt="Imagen" class="img-fluid" style="height: 690px;">
        </div>

        <div class="col-md-6 text-center" style="background-color: #efeeee; padding: 20px;">
            <h3 class="mb-3" style="color: #FF9900; font-weight: bold; font-size: 36px;">HOTEL JUPITER</h3>
            <h4 class="mb-4" style="color: black; font-weight: bold;">Iniciar Sesión</h4>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzkxybJGx7KzLT0ErNH7h59oE9rLaz9vFKETEOw8TnbnpimMhihcybINTCmJw8fkgBWX8&usqp=CAU" alt="Imagen" class="img-fluid rounded-circle mb-4" style="width: 200px; border: 3px solid black; margin: 0 auto;">
            <form method="post" action="{{url('clientes/login')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <label for="email" class="col-form-label text-left d-inline-block" style="color: #666; font-style: normal; font-weight: bold; margin-left: -360px;">Email<span class="text-danger">*</span></label>
                        <input required type="email" class="form-control" name="email" id="email" placeholder="Email" style="color: #666; font-style: italic;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <label for="password" class="col-form-label text-left d-inline-block" style="color: #666; font-style: normal; font-weight: bold; margin-left: -330px;">Password<span class="text-danger">*</span></label>
                        <input required type="password" class="form-control" name="password" id="password" placeholder="Password" style="color: #666; font-style: italic;">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <p style="color: blue; text-decoration: underline; margin-left: -205px">¿Has olvidado la contraseña?</p>
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="background-color: orange; font-weight: bold; width: 66%; font-size: 20px;">INICIAR</button>
            </form>
            <p></p>
            <p style="color: #A9A9A9; margin-left: -170px">¿Necesitas una cuenta? <a href="http://127.0.0.1:8000/register" style="color: blue; text-decoration: underline;">Registrarse</a></p>
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
                <a href="http://127.0.0.1:8000/register" style="color: white; text-decoration: none; margin-bottom: 10px;">Registro</a><br>
                <a href="http://127.0.0.1:8000/login" style="color: #FF9900; text-decoration: none;">Acceso</a><br>
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

<style>
    /* Efecto Azul a Imagen - Joseph*/
    .overlay {
        position: absolute;
        top: 0;
        left: 2;
        width: 69.7%;
        height: 100%;
        background-color: rgba(0, 0, 255, 0.3);
        z-index: 1;
    }
</style>
@endsection
