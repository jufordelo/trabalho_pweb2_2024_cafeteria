<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use app\Models\Reserva;

class GraficoReserva
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        

        return $this->chart->lineChart()
            ->setTitle('Reservas')
            ->setSubtitle('Reservas Online x Total de Reservas')
            ->addData('Reservas online', [40, 93, 35])
            ->addData('Total de Reservas', [70, 29, 77])
            ->setXAxis(['Mesas', 'Local Todo', 'Área Externa']);
    }
}
