@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$data->nombre_completo}} Detalle
                                <a href="{{url('admin/personal')}}" class="float-right btn btn-success btn-sm">Ver Todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" >
                                    <tr>
                                        <th>Nombre Completo</th>
                                        <td>{{$data->nombre_completo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Departamento</th>
                                        <td>{{$data->departamento->titulo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <td><img width="80" src="{{asset($data->foto)}}" /></td>
                                    </tr>
                                    <tr>
                                        <th>Bio</th>
                                        <td>{{$data->bio}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipo de Salario</th>
                                        <td>{{$data->tipo_salario}}</td>
                                    </tr>
                                    <tr>
                                        <th>Monto del Salario</th>
                                        <td>{{$data->salario_amt}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection
