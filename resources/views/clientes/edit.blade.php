@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if(isset($data))
                Actualizar Cliente
            @else
                Agregar Cliente
            @endif
        </h1>
        <a href="{{ url('admin/clientes') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($data))
                    Formulario de Actualización de Cliente
                @else
                    Formulario de Agregar Cliente
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form method="post" action="{{ isset($data) ? url('admin/clientes/'.$data->id) : url('admin/clientes') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($data))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="nombre_completo">Nombre Completo <span class="text-danger">*</span></label>
                    <input id="nombre_completo" name="nombre_completo" type="text" class="form-control" value="{{ isset($data) ? $data->nombre_completo : '' }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ isset($data) ? $data->email : '' }}" />
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                    <input id="telefono" name="telefono" type="text" class="form-control" value="{{ isset($data) ? $data->telefono : '' }}" />
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input id="foto" name="foto" type="file" />
                    @if(isset($data) && $data->foto)
                        <input type="hidden" name="prev_photo" value="{{ $data->foto }}" />
                        <img width="100" src="{{ asset($data->foto) }}" />
                    @endif
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <textarea id="direccion" name="direccion" class="form-control">{{ isset($data) ? $data->direccion : '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    @if(isset($data))
                        Actualizar
                    @else
                        Guardar
                    @endif
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
