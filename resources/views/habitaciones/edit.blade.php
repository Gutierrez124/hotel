@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if(isset($data))
                Actualizar Habitación
            @else
                Agregar Habitación
            @endif
        </h1>
        <a href="{{ url('admin/habitaciones') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($data))
                    Formulario de Actualización de Habitación
                @else
                    Formulario de Agregar Habitación
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

            <form method="post" action="{{ isset($data) ? url('admin/habitaciones/'.$data->id) : url('admin/habitaciones') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($data))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="rt_id">Tipo de Habitación</label>
                    <select name="rt_id" id="rt_id" class="form-control">
                        <option value="0">--- Seleccionar ---</option>
                        @foreach($tipohabitacion as $rt)
                            <option value="{{ $rt->id }}" {{ isset($data) && $data->tipo_habitacion_id == $rt->id ? 'selected' : '' }}>{{ $rt->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título" value="{{ isset($data) ? $data->titulo : '' }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
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
