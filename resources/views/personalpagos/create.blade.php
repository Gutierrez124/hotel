@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Agregar Pago de Personal
                                <a href="{{url('admin/personal')}}" class="float-right btn btn-success btn-sm">Ver Todo</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/personal/payment/'.$personal_id)}}">
                                    @csrf
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Cantidad</th>
                                            <td><input name="cantidad" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha</th>
                                            <td><input name="cantidad_fecha" class="form-control" type="date" /></td>
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
