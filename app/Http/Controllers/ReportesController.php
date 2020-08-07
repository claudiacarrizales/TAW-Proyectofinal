<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportesController extends Controller
{

    public function generarReporteCitas($id){
        $pdf = PDF::loadView('pdf.cita', ['id' => $id] );
        return $pdf->download('reporte_cita_'. $id .'.pdf');
    }

    public function generarReporteExpediente($id){
        $pdf = PDF::loadView('pdf.expediente', ['id' => $id] );
        return $pdf->download('reporte_expediente_'. $id .'.pdf');
    }

    public function generarReportePago($id){
        $pdf = PDF::loadView('pdf.pago', ['id' => $id] );
        return $pdf->download('reporte_pago_'. $id .'.pdf');
    }


}
