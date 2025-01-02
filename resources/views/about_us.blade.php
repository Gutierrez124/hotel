@extends('frontlayout')
@section('content')
<div class="container-fluid p-0 position-relative">
    <img src="https://d3bppvu871nei3.cloudfront.net/cache/img/le-six-hotel-entre-nous-68220-1600-400-crop.jpg?q=1670414924" alt="Imagen de nuestro hotel" class="img-fluid w-100">
    <div class="position-absolute top-50 start-0 translate-middle-y text-center w-0">
        <h3 class="text-white" style="background-color: rgba(0, 0, 0, 0); padding: 10px; font-weight: bold;">Sobre Nosotros</h3>
        <div style="color: white;">
            <a href="http://127.0.0.1:8000/" style="color: #FF9900; text-decoration: none;">Inicio</a> / Sobre Nosotros
        </div>
    </div>
</div>
<div class="container my-4 text-center">
    <h3>BIENVENIDO A <span style="color: #c97b06;">HOTEL JUPITER</span></h3>
	<hr style="width: 8%; margin: auto; border-top: 4px solid #ce7e07; font-weight: bold;"></hr>
	<h1></h1>
	<hr style="width: 20%; margin: auto; border-top: 4px solid #ce7e07; font-weight: bold;"></hr>
	<h1></h1>
	<hr style="width: 8%; margin: auto; border-top: 4px solid #ce7e07; font-weight: bold;"></hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="#">
                <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/75/f4/6a/habitacion-twin.jpg?w=700&h=-1&s=1" alt="Habitacion Precio" class="img-fluid" style="max-width: 80%; height: auto;">
            </a>
        </div>

        <div class="col-md-6">
            <p style="font-size: 32px;"><strong>Un servicio de calidad al mejor</strong></p>
			<p style="font-size: 32px;"><strong>precio</strong></p>
			<p style="color: #808080;"></p>
            <p style="color: #808080;">En HOTEL JUPITER, ofrecemos una experiencia excepcional donde la calidad y el confort se encuentran con tarifas inigualables. Sumérgete un ambiente de lujo y hospitalidad, donde cada detalle está cuidadosamente diseñado para garantizar tu satisfacción total. ¡Descubre tu hogar lejos del hogar con nosotros!</p>
			<p style="color: #808080;"></p>
            <hr style="width: 100%; margin: auto; border-top: 2px solid #000000;">
			<p style="color: #808080;"></p>
            <p style="color: #808080; font-style: italic;">La clave de nuestro éxito es el capital humano, un equipo que trabaja conjuntamente para lograr la satisfacción del cliente y por hacer el trabajo bien hecho y viendo los resultados en clientes que nos visitan frecuentemente.</p>

        </div>
    </div>
</div>
<div class="container my-4 text-center">

</div>


<!-- Menu Final Joseph -->
<div style="background-color: #1d1c1c; height: 190px; width: 100%; display: flex; align-items: center;">

    <!-- Sección izquierda -->
    <div style="flex: 1;">
        <div style="padding-left: 180px; color: white;">
            <div style="margin-bottom: 5px;">
                <a href="http://127.0.0.1:8000/" style="color: white; text-decoration: none; margin-bottom: 10px;">Inicio</a><br>
                <a href="http://127.0.0.1:8000/page/about-us" style="color: #FF9900; text-decoration: none; margin-bottom: 10px;">Sobre Nosotros</a><br>
                <a href="http://127.0.0.1:8000/page/contact-us" style="color: white; text-decoration: none; margin-bottom: 10px;">Contacta con Nosotros</a><br>
                <a href="http://127.0.0.1:8000/register" style="color: white; text-decoration: none; margin-bottom: 10px;">Registro</a><br>
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


</div>
@endsection
