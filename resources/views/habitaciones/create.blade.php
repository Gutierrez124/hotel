@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Habitación</h1>
        <a href="{{ url('admin/habitaciones') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Room Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Habitación</h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" action="{{ url('admin/habitaciones') }}">
                @csrf
                <div class="form-group">
                    <label for="rt_id">Seleccionar Tipo de Habitación</label>
                    <select name="rt_id" class="form-control">
                        <option value="0">--- Seleccionar ---</option>
                        @foreach($tipohabitacion as $rt)
                            <option value="{{ $rt->id }}">{{ $rt->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
