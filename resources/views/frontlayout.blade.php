<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página de Inicio</title>
	<link href="{{asset('bs5/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bs5/bootstrap.bundle.min.js')}}"></script>
</head>
<style>
    .whatsapp-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999; /* Asegura que esté por encima de otros elementos */
    }

    .whatsapp-link {
        display: block;
        width: 50px;
        height: 50px;
        background-color: #25d366; /* Color oficial de WhatsApp */
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        transition: transform 0.3s ease-in-out;
        position: relative;
    }

    .whatsapp-link:hover {
        transform: scale(1.1);
    }

    .whatsapp-link:hover::after {
        content: "Contacta con nosotros";
        position: absolute;
        bottom: calc(100% + 5px);
        left: -130px; /* Cambiamos de right a left */
        background-color: #333;
        color: #fff;
        padding: 5px; /* Ajusta el padding vertical aquí */
        border-radius: 5px;
        font-size: 14px;
        opacity: 0.9;
        z-index: 999;
        width: 120px; /* Ajusta el ancho horizontal aquí */
        text-align: center;
    }

    .whatsapp-link i {
        color: #fff;
        font-size: 24px;
    }
</style>

<div class="whatsapp-icon">
    <a href="https://wa.me/+51919538758" target="_blank" class="whatsapp-link">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>


<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	    <a class="navbar-brand" href="{{url('/')}}">Hotel</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav ms-auto">
	        <a class="nav-link" href="/#gallery">Galería</a>
	        <a class="nav-link" href="{{url('page/about-us')}}">Sobre Nosotros</a>
	        <a class="nav-link" href="{{url('page/contact-us')}}">Contacta con Nosotros</a>
	        @if(Session::has('customerlogin'))
	        <a class="nav-link" href="{{url('clientes/add-testimonial')}}">Agregar Testimonio</a>
	        <a class="nav-link" href="{{url('logout')}}">Cerrar Sesión</a>
	        @else
	        <a class="nav-link" href="{{url('register')}}">Registro</a>
            <a class="nav-link" href="{{url('login')}}">Acceso</a>
	        @endif
            <button class="btn btn-primary btn-sm">
                <a class="nav-link text-white" href="{{url('admin/login')}}">ADMIN</a>
            </button>

	      </div>
	    </div>
	  </div>
	</nav>
		<main>
			@yield('content')
		</main>
	</body>
</html>
