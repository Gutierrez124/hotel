@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Todas las Reservas
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Habitación No.</th>
                            <th>CheckIn Date</th>
                            <th>CheckOut Date</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Habitación No.</th>
                            <th>CheckIn Date</th>
                            <th>CheckOut Date</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->cliente->nombre_completo }}</td>
                            <td>{{ $reserva->habitacion ? $reserva->habitacion->titulo : 'N/A' }}</td>
                            <td>{{ $reserva->checkin_date }}</td>
                            <td>{{ $reserva->checkout_date }}</td>
                            <td>
                                <a href="{{ url('admin/reservas/'.$reserva->id.'/generar-boleta') }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endsection
