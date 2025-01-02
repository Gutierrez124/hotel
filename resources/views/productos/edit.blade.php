@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        @if(isset($data))
            Actualizar Producto
        @else
            Agregar Producto
        @endif
    </h1>

    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($data))
                    Formulario de Actualización de Producto
                @else
                    Formulario de Agregar Producto
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form method="post" action="{{ isset($data) ? url('admin/productos/'.$data->id) : url('admin/productos') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($data))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="{{ isset($data) ? $data->nombre : '' }}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio" value="{{ isset($data) ? $data->precio : '' }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del producto" value="{{ isset($data) ? $data->descripcion : '' }}">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese el stock disponible" value="{{ isset($data) ? $data->stock : '' }}">
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

@section('script')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endsection
