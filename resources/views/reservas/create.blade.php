@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Reserva</h1>
        <a href="{{ url('/admin/reservas') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todas las Reservas
        </a>
    </div>

    <!-- Formulario de Reserva -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Reserva</h6>
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

            <form action="{{ url('admin/reservas') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cliente_id">Seleccionar Cliente <span class="text-danger">*</span></label>
                    <select class="form-control" name="cliente_id" id="cliente_id">
                        <option value="">--- Seleccionar Cliente ---</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre_completo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="checkin_date">Check-In Date <span class="text-danger">*</span></label>
                    <input type="date" name="checkin_date" class="form-control" id="checkin_date">
                </div>
                <div class="form-group">
                    <label for="checkout_date">Check-Out Date <span class="text-danger">*</span></label>
                    <input type="date" name="checkout_date" class="form-control" id="checkout_date">
                </div>
                <div class="form-group">
                    <label for="habitacion_id">Cuartos Disponibles <span class="text-danger">*</span></label>
                    <select class="form-control" name="habitacion_id" id="habitacion_id">
                        <option value="">--- Seleccionar Habitación ---</option>
                        @foreach($habitaciones as $habitacion)
                            @php
                                $ocupada = $habitaciones_ocupadas->contains($habitacion->id);
                                $precio = $habitacion->tipoHabitacion->precio ?? 'N/A';
                            @endphp
                            @if($ocupada)
                                <option value="{{ $habitacion->id }}" disabled>{{ $habitacion->titulo }} - Ocupada - Precio: {{ $precio }}</option>
                            @else
                                <option value="{{ $habitacion->id }}">{{ $habitacion->titulo }} - Disponible - Precio: {{ $precio }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_adultos">Total Adultos <span class="text-danger">*</span></label>
                    <input type="text" name="total_adultos" class="form-control" id="total_adultos">
                </div>
                <div class="form-group">
                    <label for="total_niños">Total Niños</label>
                    <input type="text" name="total_niños" class="form-control" id="total_niños">
                </div>
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
