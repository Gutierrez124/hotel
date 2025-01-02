@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detalles del Cliente</h1>
        <a href="{{ url('/admin/clientes') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Client Details -->
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre_completo" class="col-sm-3 col-form-label">Nombre Completo:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="nombre_completo"
                                value="{{ $data->nombre_completo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="email"
                                value="{{ $data->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="telefono"
                                value="{{ $data->telefono }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
                        <div class="col-sm-9">
                            <textarea readonly class="form-control-plaintext" id="direccion"
                                rows="5">{{ $data->direccion }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Photo Display -->
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                </div>
                <div class="card-body text-center">
                    <img width="200" src="{{ asset($data->foto) }}" class="img-fluid rounded" alt="Client Photo">
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
