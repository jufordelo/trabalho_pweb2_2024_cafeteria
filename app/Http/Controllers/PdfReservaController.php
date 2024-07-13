<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reserva;
use PDF;

class PdfReservaController extends Controller
{
    public function generatePdf(){

     $reserva = Reserva::all();
     $pdfr = PDF :: loadView('pdf', compact ('reserva'));
     return  $pdfr->setPaper('a4')->download('Relatorio_de_Reserva.pdf');




    }
}
