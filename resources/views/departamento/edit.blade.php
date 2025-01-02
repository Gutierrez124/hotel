@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Actualizar Departamento
                                <a href="{{url('admin/departamento')}}" class="float-right btn btn-success btn-sm">Ver Todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/departamento/'.$data->id)}}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Título</th>
                                            <td><input value="{{$data->titulo}}" name="titulo" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Detalle</th>
                                            <td>
                                                <textarea name="detalle" class="form-control">{{$data->detalle}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection
