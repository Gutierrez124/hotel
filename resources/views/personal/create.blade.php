@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Agregar Personal
                                <a href="{{url('admin/personal')}}" class="float-right btn btn-success btn-sm">Ver Todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/personal')}}">
                                    @csrf
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <td><input name="nombre_completo" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Seleccionar Departamento</th>
                                            <td>
                                                <select name="departamento_id" class="form-control">
                                                    <option value="0">--- Seleccionar ---</option>
                                                    @foreach($departamentos as $dp)
                                                    <option value="{{$dp->id}}">{{$dp->titulo}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <td><input name="foto" type="file" /></td>
                                        </tr>
                                        <tr>
                                            <th>Bio</th>
                                            <td><textarea class="form-control" name="bio"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Tipo de Salario</th>
                                            <td>
                                                <input type="radio" name="tipo_salario" value="daily"> Diario
                                                <input type="radio" name="tipo_salario" value="monthly"> Mensual
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Monto del Salario</th>
                                            <td><input name="salario_amt" class="form-control" type="number" /></td>
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
