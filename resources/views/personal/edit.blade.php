@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Actualizar Personal
                                <a href="{{url('admin/personal')}}" class="float-right btn btn-success btn-sm">Ver todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/personal/'.$data->id)}}">
                                    @method('put')
                                    @csrf
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <td><input value="{{$data->nombre_completo}}" name="nombre_completo" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Seleccionar Departamento</th>
                                            <td>
                                                <select name="departamento_id" class="form-control">
                                                    <option value="0">--- Seleccionar ---</option>
                                                    @foreach($departamentos as $dp)
                                                    <option @if($data->departamento_id==$dp->id) selected @endif value="{{$dp->id}}">{{$dp->titulo}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <td>
                                                <input name="foto" type="file" />
                                                <input type="hidden" name="prev_photo" value="{{$data->foto}}"  />
                                                <img width="80" src="{{asset($data->foto)}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bio</th>
                                            <td><textarea class="form-control" name="bio">{{$data->bio}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Tipo de Salario</th>
                                            <td>
                                                <input @if($data->tipo_salario=='daily') checked @endif type="radio" name="tipo_salario" value="daily"> Diario
                                                <input @if($data->tipo_salario=='monthly') checked @endif type="radio" name="tipo_salario" value="monthly"> Mensual
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Monto del Salario</th>
                                            <td><input value="{{$data->salario_amt}}" name="salario_amt" class="form-control" type="number" /></td>
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
