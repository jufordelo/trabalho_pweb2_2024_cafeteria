<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Encomenda; // Substitua pelo modelo correto da sua aplicação

class PDFController extends Controller
{
    public function generatePDF()
    {
        $encomendas = Encomenda::all(); // Busca as encomendas do banco de dados ou use o método apropriado para recuperar os dados

        // Carrega a view "pdf" e passa os dados
        $pdf = PDF::loadView('pdf', ['encomendas' => $encomendas]);

        // Retorna o PDF gerado para download no navegador
        return $pdf->download('relatorio.pdf');
    }
}
