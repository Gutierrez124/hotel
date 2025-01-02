@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detalles del Tipo de Habitación</h1>
        <a href="{{ url('/admin/tipohabitacion') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Room Type Details -->
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="titulo" class="col-sm-3 col-form-label">Título:</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="titulo"
                                    value="{{ $data->titulo }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio" class="col-sm-3 col-form-label">Precio:</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="precio"
                                    value="{{ $data->precio }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-sm-3 col-form-label">Detalle:</label>
                            <div class="col-sm-9">
                                <textarea readonly class="form-control-plaintext" id="detalle" rows="5">{{ $data->detalle }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Image Gallery -->
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Galería de Imágenes</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($data->tipohabitacionimg as $img)
                        <div class="col-md-6 mb-3">
                            <img src="{{ asset($img->img_src) }}" class="img-fluid rounded" alt="Image">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<!-- No additional scripts required for this page -->
@endsection
