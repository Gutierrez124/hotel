@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Crear Pedido
                <a href="{{ url('admin/pedidos') }}" class="float-right btn btn-success btn-sm">Ver Todo</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <form id="pedidoForm" method="post" action="{{ url('admin/pedidos') }}">
                @csrf
                <label>Recibo:</label>
                <div>
                    <label><input type="radio" name="tipo" id="boletaRadio"> Boleta</label>
                    <label><input type="radio" name="tipo" id="facturaRadio"> Factura</label>
                </div>
                <!-- Input para Boleta -->
                <div id="input_boleta" style="display: none;">
                    <label for="boleta">Número de Boleta:</label>
                    <input type="text" name="numero_boleta" id="numero_boleta" class="form-control" value="B-{{ rand(1000, 9999) }}" readonly>
                </div>
                <!-- Input para Factura -->
                <div id="input_factura" style="display: none;">
                    <label for="factura">Número de Factura:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">F-</span>
                        </div>
                        <input type="text" name="numero_factura" id="numero_factura" class="form-control" value="">
                    </div>
                </div>
                <input type="hidden" name="tipo" id="tipo">
                <br>
                <div class="form-group">
                    <label for="cliente">Seleccionar Cliente</label>
                    <select name="cliente" id="cliente" class="form-control">
                        <option value="0">--- Seleccionar ---</option>
                        @foreach($cliente as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_completo }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach($data as $index => $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->nombre }}</td>
                                <td>{{ $d->precio }}</td>
                                <td>
                                    <div class="form-group">
                                        <input name="cantidades[{{ $index }}]" id="cantidad_{{ $d->id }}" type="number" class="form-control cantidad" data-precio="{{ $d->precio }}" value="0" min="0">
                                        <input type="hidden" name="productos[{{ $index }}]" value="{{ $d->id }}">
                                    </div>
                                </td>
                                <td class="subtotal">0.00</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input name="subtotal" id="subtotal" type="number" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="igv">IGV (18%)</label>
                    <input name="igv" id="igv" type="number" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="total">Total (con IGV)</label>
                    <input name="total" id="total" type="number" class="form-control" readonly>
                </div>
                @if($producto->isEmpty())
                <p>No hay productos disponibles.</p>
                @else
                @foreach($producto as $producto)
                <input type="hidden" name="productos[]" value="{{ $producto->id }}">
                @endforeach
                @endif
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
<script>
    // Script para calcular el subtotal, IGV y total dinámicamente
    $(document).ready(function() {
        $('.cantidad').on('input', function() {
            var subtotal = 0;
            var total = 0;
            $('.cantidad').each(function() {
                var cantidad = parseInt($(this).val());
                var precio = parseFloat($(this).data('precio'));
                var subtotalProducto = cantidad * precio;
                $(this).closest('tr').find('.subtotal').text(subtotalProducto.toFixed(2));
                subtotal += subtotalProducto;
            });
            var igv = subtotal * 0.18;
            total = subtotal + igv;

            $('#subtotal').val(subtotal.toFixed(2));
            $('#igv').val(igv.toFixed(2));
            $('#total').val(total.toFixed(2));
        });

        // Handle form submission to ensure product quantities are always submitted as an array
        $('#pedidoForm').submit(function() {
            $('.cantidad').each(function(index) {
                if ($(this).val() === '') {
                    $(this).val(0); // Set quantity to 0 if left empty
                }
            });
        });

        // Inicializar Select2
        $('#cliente').select2({
            placeholder: 'Seleccionar Cliente',
            allowClear: true
        });

        // Mostrar campos según tipo de recibo seleccionado
        document.getElementById('boletaRadio').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('input_boleta').style.display = 'block';
                document.getElementById('input_factura').style.display = 'none';
                document.getElementById('tipo').value = 'Boleta'; // Actualizar el valor del campo tipo
            }
        });

        document.getElementById('facturaRadio').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('input_factura').style.display = 'block';
                document.getElementById('input_boleta').style.display = 'none';
                document.getElementById('tipo').value = 'Factura'; // Actualizar el valor del campo tipo
            }
        });
    });
</script>
@endsection
