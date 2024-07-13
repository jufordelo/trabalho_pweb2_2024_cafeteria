<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\categoria1;
use App\Models\CategoriaReserva;
use Illuminate\Http\Request;
use App\Charts\GraficoReserva;

class ReservaController extends Controller
{
    public function index()
    {
        $dados = Reserva::all();

        return view("reserva.listr", ["dados" => $dados]);
    }

    public function create()
    {
        $categoria_reservas = CategoriaReserva::all();

        return view("reserva.formr", ['categoria_reservas' => $categoria_reservas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'resp' => "required|max:100",
            'data' => "nullable",
            'hora' => "nullable",
            'pss' => "required|max:3",
            'tel' => "nullable",
        ], [
            'resp.required' => "O :attribute é obrigatório",
            'resp.max' => "São permitidos 100 caracteres",
            'pss.required' => "O :attribute é obrigatório",
            'pss.max' => "São permitidos 3 caracteres",
            //  'categoria_reserva_id.required'=> "O: attribute é obrigatório",
        ]);

        // dd($request->all());
        Reserva::create(
            $request->all()
        );

        return redirect('reserva');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Reserva::findOrFail($id);

        $categoria_reservas = CategoriaReserva::all();

        return view("reserva.formr", [
            'dado' => $dado,
            'categoria_reservas' => $categoria_reservas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'resp' => "required|max:100",
            'pss' => "required|max:16",
            'tel' => "nullable"
        ], [
            'resp.required' => "O :attribute é obrigatório",
            'resp.max' => "São permitidos 100 caracteres",
            'pss.required' => "O :attribute é obrigatório",
            'pss.max' => "É permitido somente 3 unidades",
            'categoria_reserva_id.required' => "O: attribute é obrigatório",
        ]);


        Reserva::updateOrCreate(
            ['id' => $request->id],

            [
                'resp' => $request->resp,
                'tel' => $request->tel,
                'pss' => $request->pss,
                'categoria_reserva_id' => $request->categoria_reserva_id,
            ]
        );
        return redirect('reserva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Reserva::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('reserva');
    }
    public function search(Request $request)
    {
        if(! empty ($request->resp)){
            $dados = Reserva::where(
                "resp",
                "like",
                "%". $request->resp . "%" )->get();
        } else{
            $dados=Reserva::all();
        } //dd($dados)
             return view("reserva.listr",["dados"=> $dados]);
    }
    public function chart(GraficoReserva $reservaChart)
    {
        return view("reserva.chart", ["reservaChart" => $reservaChart -> build()]);
    }
}
