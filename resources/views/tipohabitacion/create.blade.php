@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Tipos de Habitación</h1>
        <a href="{{url('/admin/tipohabitacion')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Form Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Tipo de Habitación</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('admin/tipohabitacion') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" id="precio">
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle</label>
                    <textarea name="detalle" id="detalle" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="imgs">Galería</label>
                    <input type="file" multiple name="imgs[]" class="form-control-file" id="imgs">
                </div>
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
