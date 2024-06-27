<?php

namespace App\Http\Controllers;

use App\Models\Personalizado;
use App\Models\CategoriaPersonalizado;
use Illuminate\Http\Request;

class CategoriaPersonalizadoController extends Controller
{
    public function index()
    {
        $dados = Personalizado::all();

        return view("personalizado.lists", ["dados" => $dados]);
    }

    public function create()
    {
        $categoria_personalizado = CategoriaPersonalizado::all();

        return view("personalizado.forms", ['categoria_personalizado' => $categoria_personalizado]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nome'=>"required|max:100",
             'peso'=> "required|max:16",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'peso.required'=> "O :attribute é obrigatório",
            'peso.max'=> "São permitidos 16 caracteres",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Encomenda::create(
            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'peso'=> $request->peso,
            'categoria_id'=>$request->categoria_id,
            ] );

            return redirect('personalizado');
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
        $dado= Personalizado::findOrFail($id);
        $categorias= Categoria::all();

        return view ("personalizado.form",
        ['dado'=>$dado,
       'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>"required|max:100",
             'peso'=> "required|max:16",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'peso.required'=> "O :attribute é obrigatório",
            'peso.max'=> "É permitido somente 100 unidades",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Personalizado::updateOrCreate(
            [ 'id'=> $request->id],

            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'peso'=> $request->peso,
            'categoria_id'=>$request->categoria_id,
        ]);
            return redirect('personalizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Personalizado::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('personalizado');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Personalizado::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Personalizado::all();
        } //dd($dados)
             return view("personalizado.list",["dados"=> $dados]);

    }
}
