@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Cliente</h1>
        <a href="{{ url('admin/clientes') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Client Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Cliente</h6>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{ url('admin/clientes') }}">
                @csrf
                <input type="hidden" name="form_type" value="form2">
                <div class="form-group">
                    <label for="nombre_completo">Nombre Completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Ingrese el nombre completo">
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" multiple>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Ingrese la dirección"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
