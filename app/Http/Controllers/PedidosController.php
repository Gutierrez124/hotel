<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\DetallePedido;
use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Pedidos::all();
        $dato=DetallePedido::all();
        return view('pedidos.index',['data'=>$data, 'dato'=>$dato]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente=Clientes::all();
        $producto=Productos::all();
        $data=Productos::all();
        return view('pedidos.create',['cliente'=>$cliente, 'producto'=>$producto, 'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente' => 'required|exists:clientes,id',
            'cantidades.*' => 'required|integer|min:0',
        ]);

        // Obtener el tipo según la selección del usuario y los valores de los campos de entrada
        $tipo = '';

        if ($request->has('tipo')) {
            if ($request->input('tipo') === 'Boleta' && $request->has('numero_boleta')) {
                $tipo = $request->input('numero_boleta');
            } elseif ($request->input('tipo') === 'Factura' && $request->has('numero_factura')) {
                // Concatenar "F-" con el número de factura ingresado por el usuario
                $tipo = 'F-' . $request->input('numero_factura');
            }
        }

        // Crear el pedido
        $pedido = new Pedidos();
        $pedido->tipo = $tipo;
        $pedido->cliente_id = $request->cliente;
        $pedido->total = $request->total;
        $pedido->save();

        // Guardar los detalles del pedido solo para productos con cantidades mayores que 0
        foreach ($request->cantidades as $key => $cantidad) {
            if ($cantidad > 0) {
                $detalle = new DetallePedido();
                $detalle->pedido_id = $pedido->id;
                $detalle->producto_id = $request->productos[$key];
                $detalle->cantidad = $cantidad;
                $detalle->save();

                // Actualizar el stock del producto
                $producto = Productos::find($request->productos[$key]);
                $producto->stock -= $cantidad; // Restar la cantidad comprada al stock actual
                $producto->save();
            }
        }

        // Redireccionar con un mensaje de éxito
        return redirect('admin/pedidos/create')->with('success', 'Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function generarBoleta(string $id)
    {
        $pedido = Pedidos::findOrFail($id);
        $detalles = DetallePedido::where('pedido_id', $id)->get();

        // Crear instancia TCPDF y establecer el tamaño del papel
        $pdf = new TCPDF('P', 'mm', array(80, 150), true, 'UTF-8', false);
        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Boleta de Pedido');
        $pdf->SetMargins(5, 5, 5);  // Establecer márgenes pequeños
        $pdf->AddPage();

        // Establecer fuente
        $pdf->SetFont('helvetica', '', 10);

        // Agregar secciones al PDF
        $this->addEncabezado($pdf);
        $this->addBoletaInfo($pdf, $pedido);
        $this->addClienteInfo($pdf, $pedido);
        $this->addDetallesPedido($pdf, $detalles);
        $this->addTotal($pdf, $pedido);
        $this->addAgradecimiento($pdf);

        // Salida del PDF
        $pdf->Output('boleta.pdf', 'I');
    }

    private function addEncabezado($pdf)
    {
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 8, 'HOTEL JUPITER', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(0, 5, 'RUC 20314727500', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Av. Larco 566. Trujillo - Perú', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Tel: (01) 123-4567', 0, 1, 'C');
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');
    }

    private function addBoletaInfo($pdf, $pedido)
    {
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->Cell(0, 6, 'BOLETA DE VENTA', 0, 1, 'C');
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(0, 5, 'N° de Documento: ' . $pedido->tipo, 0, 1, 'C');
        $pdf->Cell(0, 5, 'Fecha: ' . date('Y-m-d H:i:s'), 0, 1, 'C');
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');
    }

    private function addClienteInfo($pdf, $pedido)
    {
        $pdf->Cell(0, 5, 'Cliente: ' . $pedido->cliente->nombre_completo, 0, 1, 'L');
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');
    }

    private function addDetallesPedido($pdf, $detalles)
    {
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(0, 5, 'Detalles del Pedido:', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 9);

        // Tabla de detalles
        $pdf->SetX(5);
        $pdf->Cell(35, 5, 'Producto', 1, 0, 'C');
        $pdf->Cell(15, 5, 'Cant.', 1, 0, 'C');
        $pdf->Cell(20, 5, 'Precio', 1, 1, 'C');

        foreach ($detalles as $detalle) {
            $producto = Productos::findOrFail($detalle->producto_id);  // Buscar producto por id
            $pdf->SetX(5);
            $pdf->Cell(35, 5, $producto->nombre, 1, 0, 'L');
            $pdf->Cell(15, 5, $detalle->cantidad, 1, 0, 'C');
            $pdf->Cell(20, 5, number_format($producto->precio, 2), 1, 1, 'R');
        }

        // Separador
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');
    }

    private function addTotal($pdf, $pedido)
    {
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(40, 5, 'Total', 1, 0, 'R');
        $pdf->Cell(30, 5, number_format($pedido->total, 2), 1, 1, 'R');

        // Separador
        $pdf->Cell(0, 5, str_repeat('-', 44), 0, 1, 'C');
    }

    private function addAgradecimiento($pdf)
    {
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(0, 5, 'Gracias por su compra.', 0, 1, 'C');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
