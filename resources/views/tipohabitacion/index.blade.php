@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tipos de Habitaciones</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tipos de Habitaciones
            <a href="{{url('/admin/tipohabitacion/create')}}" class="float-right btn-primary btn-sm">Agregar nueva</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Precio</th>
                        <th>Imagen de la Galería</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Precio</th>
                        <th>Imagen de la Galería</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->titulo}}</td>
                        <td>{{$d->precio}}</td>
                        <td>{{count($d->tipohabitacionimg)}}</td>
                        <td>
                            <a href="{{url('admin/tipohabitacion/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{url('admin/tipohabitacion/'.$d->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="openEliminarModal({{ $d->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Modal Eliminar -->
    <div class="modal fade" id="eliminarProductoModal" tabindex="-1" role="dialog" aria-labelledby="eliminarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarProductoModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este tipo de habitacion?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a id="eliminarProductoBtn" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@section('script')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    <script>
    function openEliminarModal(id) {
        $('#eliminarProductoBtn').attr('href', '{{ url("admin/tipohabitacion") }}/' + id + '/delete');
        $('#eliminarProductoModal').modal('show');
    }
</script>
    @endsection
@endsection
