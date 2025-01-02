@extends('frontlayout')
@section('content')

<!-- Slider Section Start -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	@foreach($banners as $index => $banner)
	    <div class="carousel-item @if($index==0) active @endif">
	      <img src="{{asset($banner->banner_src)}}" class="d-block w-100" alt="{{$banner->alt_text}}">
	    </div>
	    @endforeach
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- Slider Section End -->

    <!-- Gallery Section Start -->
    <div class="container my-5">
        <h1 class="text-center border-bottom pb-3" id="gallery">Galería</h1>
        <div class="row my-4">
            @foreach($tipohabitacion as $rtype)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">{{$rtype->titulo}}</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($rtype->tipohabitacionimg as $index => $img)
                        <a href="{{asset($img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                            @if($index > 0)
                            <img class="img-fluid d-none" src="{{asset($img->img_src)}}" />
                            @else
                            <img class="img-fluid w-100" src="{{asset($img->img_src)}}" />
                            @endif
                        </a>
                        @endforeach
                    </div>
                    <div class="card-body text-center bg-light">
                        <h5 class="mb-0">Precio: S/. {{$rtype->precio}}</h5>
                        <p class="mt-2">{{$rtype->detalle}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Gallery Section End -->

	<!-- testimonial Slider Section Start -->
	<h1 class="text-center mt-5" id="gallery">Testimonios</h1>
	<div id="testimonios" class="carousel slide p-5 bg-secondary text-white border mb-5" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	@foreach($testimonios as $index => $testi)
	    <div class="carousel-item @if($index==0) active @endif">
	      	<figure class="text-center">
			  <blockquote class="blockquote">
			    <p>{{$testi->testi_cont}}</p>
			  </blockquote>
			</figure>
	    </div>
	    @endforeach
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#testimonios" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#testimonios" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- testimonial Section End -->



	<!-- Menu Final Joseph -->
	<div style="background-color: #1d1c1c; height: 190px; width: 100%; display: flex; align-items: center;">

		<!-- Sección izquierda -->
		<div style="flex: 1;">
			<div style="padding-left: 180px; color: white;">
				<div style="margin-bottom: 5px;">
					<a href="http://127.0.0.1:8000/" style="color: #FF9900; text-decoration: none; margin-bottom: 10px;">Inicio</a><br>
					<a href="http://127.0.0.1:8000/page/about-us" style="color: white; text-decoration: none; margin-bottom: 10px;">Sobre Nosotros</a><br>
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



    <!-- LightBox css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css') }}" />
    <!-- LightBox Js -->
    <script type="text/javascript" src="{{ asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js') }}"></script>
    <style type="text/css">
	.hide{
		display: none;
	}
    .card-header, .card-footer {
        background-color: #f8f9fa;
    }
    .card-header h5 {
        font-size: 1.25rem;
    }
    .card-footer h5 {
        font-size: 1rem;
    }
    .card-body img {
        transition: transform 0.3s ease-in-out;
    }
    .card-body img:hover {
        transform: scale(1.05);
    }

    .card-body img:hover {
        transform: scale(1.05);
    }
    
    .card-body p {
        margin-top: 0.5rem;
    }

</style>
@endsection
