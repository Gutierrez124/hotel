<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Clientes;
use App\Models\Tipohabitacion;
use App\Models\Habitaciones;
use TCPDF;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservas = Reservas::where('ref', 1)->get();
        return view('reservas.index',['data'=>$reservas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todos los clientes
        $clientes = Clientes::all();

        // Obtener todas las habitaciones
        $habitaciones = Habitaciones::all();

        // Obtener todos los tipos de habitaciones
        $tiposHabitaciones = TipoHabitacion::all();

        // Obtener las habitaciones ocupadas
        $habitaciones_ocupadas = Reservas::where('ref', 1)->pluck('habitacion_id');

        return view('reservas.create', compact('clientes', 'habitaciones', 'tiposHabitaciones', 'habitaciones_ocupadas'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'habitacion_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adultos' => 'required',
        ]);

        $data = new Reservas;
        $data->cliente_id = $request->cliente_id;
        $data->habitacion_id = $request->habitacion_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adultos = $request->total_adultos;
        $data->total_niños = $request->total_niños;
        $data->ref = 1;

        $data->save();
        return redirect('admin/reservas/create')->with('success', 'Se han agregado datos.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservas=Reservas::all();
        return view('reservas.historial',['data'=>$reservas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reservas::findOrFail($id);

        // Cambiar el valor de ref a 0
        $reserva->ref = 0;
        $reserva->save();

        return redirect('admin/reservas')->with('success', 'Los datos han sido eliminados.');
    }


    public function front_booking()
    {
        $clientes=Clientes::all();
        $habitaciones=Habitaciones::all();
        return view('front-booking',['data'=>$clientes,'habitaciones'=>$habitaciones]);
    }

    public function generarBoleta($id)
    {
        $reserva = Reservas::findOrFail($id);

        // Crear instancia TCPDF y establecer el tamaño del papel
        $pdf = new TCPDF('P', 'mm', array(80, 150), true, 'UTF-8', false);
        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Boleta de Reservación');
        $pdf->SetMargins(5, 5, 5);  // Establecer márgenes pequeños
        $pdf->AddPage();

        // Establecer fuente
        $pdf->SetFont('', '', 12);

        // Encabezado
        $this->addEncabezado($pdf);

        // Información del cliente
        $this->addClienteInfo($pdf, $reserva);

        // Detalles de reserva
        $this->addDetallesReserva($pdf, $reserva);

        // Tabla de fechas y precios
        $this->addTabla($pdf, $reserva);

        // Separador y agradecimiento
        $this->addAgradecimiento($pdf);

        // Salida del PDF
        $pdf->Output('boleta.pdf', 'I');
    }

    private function addEncabezado($pdf)
    {
        $pdf->SetXY(10, 10);
        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(0, 5, '', 0, 1);
        $pdf->Cell(0, 5, 'HOTEL JUPITER', 0, 1, 'C');

        $pdf->SetFont('', '', 8);
        $pdf->Cell(0, 5, 'RUC 20314727500', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Av. Larco 566. Trujillo - Perú', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Tel: (01) 123-4567', 0, 1, 'C');


        // Separador
        $pdf->Cell(0, 5, '---------------------------------------------', 0, 1, 'C');

        // Título
        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(0, 5, 'BOLETA DE RESERVA', 0, 1, 'C');
    }

    private function addClienteInfo($pdf, $reserva)
    {
        // Número de boleta
        $pdf->SetFont('', '', 8);
        $pdf->Cell(0, 5, 'N° de Boleta: B-000' . $reserva->id, 0, 1, 'C');

        // Separador
        $pdf->Cell(0, 5, '---------------------------------------------', 0, 1, 'C');

        // Información del cliente
        $pdf->Cell(0, 5, 'Cliente: ' . $reserva->cliente->nombre_completo, 0, 1, 'L');
        $pdf->Cell(0, 5, 'Tipo de Habitación: ' . $reserva->habitacion->tipohabitacion->titulo, 0, 1, 'L');
        $pdf->Cell(0, 5, 'Fecha: ' . date('Y-m-d'), 0, 1, 'L');
    }

    private function addDetallesReserva($pdf, $reserva)
    {
        // Espacio
        $pdf->Cell(0, 5, '', 0, 1);
        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(0, 5, 'Detalles de Reserva: ', 0, 1, 'L');
        $pdf->SetFont('', '', 8);
        $pdf->Cell(0, 5, 'N° de adultos: ' . $reserva->total_adultos, 0, 1, 'L');
        $pdf->Cell(0, 5, 'N° de niños: ' . $reserva->total_niños, 0, 1, 'L');
        $pdf->Cell(0, 5, '', 0, 1);
    }

    private function addTabla($pdf, $reserva)
    {
        // Tabla
        $pdf->SetX(3);
        $pdf->Cell(25, 5, 'Fecha de Entrada', 1, 0, 'C');
        $pdf->Cell(25, 5, 'Fecha de Salida', 1, 0, 'C');
        $pdf->Cell(25, 5, 'Precio Total', 1, 1, 'C');

        // Valores de la reserva
        $pdf->SetX(3);
        $pdf->Cell(25, 5, $reserva->checkin_date, 1, 0, 'C');
        $pdf->Cell(25, 5, $reserva->checkout_date, 1, 0, 'C');
        $pdf->Cell(25, 5, $reserva->habitacion->tipohabitacion->precio, 1, 1, 'C');
    }

    private function addAgradecimiento($pdf)
    {
        // Separador
        $pdf->Cell(0, 5, '---------------------------------------------', 0, 1, 'C');

        // Agradecimiento
        $pdf->Cell(0, 5, 'Gracias por alojarse en Hotel Jupiter.', 0, 1, 'C');
    }
}
