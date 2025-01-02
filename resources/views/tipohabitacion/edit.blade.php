@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if(isset($data))
            Editar Tipo de Habitación
            @else
            Agregar Tipo de Habitación
            @endif
        </h1>
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

            <form enctype="multipart/form-data" action="{{ isset($data) ? url('admin/tipohabitacion/'.$data->id) : url('admin/tipohabitacion') }}" method="post">
                @csrf
                @if(isset($data))
                @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ isset($data) ? $data->titulo : '' }}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" id="precio" value="{{ isset($data) ? $data->precio : '' }}">
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle</label>
                    <textarea name="detalle" id="detalle" cols="30" rows="10" class="form-control">{{ isset($data) ? $data->detalle : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imgs">Galería de Imágenes</label>
                    <input type="file" multiple name="imgs[]" class="form-control-file" id="imgs">
                    @if(isset($data))
                    <div class="mt-3">
                        <table class="table table-bordered">
                            @foreach($data->tipohabitacionimg as $img)
                            <tr>
                                <td>
                                    <img width="150" src="{{asset($img->img_src)}}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success btn-block">
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

@section('script')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".delete-image").on('click',function(){
        var _img_id=$(this).attr('data-image-id');
        var _vm=$(this);
        $.ajax({
            url:"{{url('admin/tipohabitacion/delete')}}/"+_img_id,
            dataType:'json',
            beforeSend:function(){
                _vm.addClass('disabled');
            },
            success:function(res){
                if(res.bool==true){
                    _vm.closest('tr').remove();
                }
                _vm.removeClass('disabled');
            }
        });
    });
});
</script>
@endsection

@endsection
