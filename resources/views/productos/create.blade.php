@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar Productos
                <a href="{{ url('/admin/productos') }}" class="float-right btn btn-primary btn-sm">Ver Todo</a>
            </h6>
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
                <p class="text-success">{{ session('success') }}</p>
            @endif

            <form action="{{ url('admin/productos') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" id="precio">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock">
                </div>

                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
