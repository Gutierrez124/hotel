@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Actualizar Cliente</h1>
        <a href="{{url('admin/banner')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Ver Todo
        </a>
    </div>

    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Actualización de Banner</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{url('admin/banner/'.$data->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="banner_src">Imagen Banner <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" name="banner_src" class="custom-file-input" id="banner_src">
                        <label class="custom-file-label" for="banner_src">Seleccionar archivo</label>
                    </div>
                    <input type="hidden" name="prev_photo" value="{{$data->banner_src}}" />
                    <img width="100" src="{{asset($data->banner_src)}}" class="img-thumbnail mt-2" />
                </div>
                <div class="form-group">
                    <label for="alt_text">Texto alternativo <span class="text-danger">*</span></label>
                    <input type="text" name="alt_text" class="form-control" value="{{$data->alt_text}}" />
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="estado_publicación" class="form-check-input" id="estado_publicación" @if($data->estado_publicación=='on') checked @endif>
                    <label class="form-check-label" for="estado_publicación">Estado de publicación</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
