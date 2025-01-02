@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}} Departamento
                                <a href="{{url('admin/departamento')}}" class="float-right btn btn-success btn-sm">Ver Todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" >
                                    <tr>
                                        <th>Título</th>
                                        <td>{{$data->titulo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Detalle</th>
                                        <td>{{$data->detalle}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection
