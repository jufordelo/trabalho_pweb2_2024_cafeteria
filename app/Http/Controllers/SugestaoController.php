<?php

namespace App\Http\Controllers;

use App\Models\Sugestao;
use App\Models\CatSugestao;
use Illuminate\Http\Request;

class SugestaoController extends Controller
{
    public function index()
    {
        $dados = Sugestao::all();

        return view("sugestao.lists", ["dados" => $dados]);
    }

    public function create()
    {
        $categoria_sugestaos = CatSugestao::all();

        return view("sugestao.forms", ['cat_sugestaos' => $categoria_sugestaos]);
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
            //  'categoria_sugestao_id.required'=> "O: attribute é obrigatório",
        ]);

        // dd($request->all());
        Sugestao::create(
            $request->all()
        );

        return redirect('sugestao');
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
        $dado = Sugestao::findOrFail($id);

        $cat_sugestaos = CatSugestao::all();

        return view("sugestao.forms", [
            'dado' => $dado,
            'cat_sugestaos' => $cat_sugestaos
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
            'cat_sugestao_id.required' => "O: attribute é obrigatório",
        ]);


        Sugestao::updateOrCreate(
            ['id' => $request->id],

            [
                'resp' => $request->resp,
                'tel' => $request->tel,
                'pss' => $request->pss,
                'cat_sugestao_id' => $request->cat_sugestao_id,
            ]
        );
        return redirect('sugestao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Sugestao::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('sugestao');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Sugestao::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Sugestao::all();
        } //dd($dados)
             return view("sugestao.lists",["dados"=> $dados]);
    }
}
