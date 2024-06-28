<?php

namespace App\Http\Controllers;
use App\Models\Personalizado;
use App\Models\CategoriaPersonalizado;
use Illuminate\Http\Request;

class PersonalizadoController extends Controller
{
    public function index()
    {
        $dados= Personalizado::all();

        return view("personalizado.list", ["dados"=> $dados]);
    }


    public function create()
    {
        $categoria_personalizados= CategoriaPersonalizado::all();
        return view("personalizado.form",['categoria_personalizados'=> $categoria_personalizados]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'=>"required|max:100",
             'peso'=> "required|max:16",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'peso.required'=> "O :attribute é obrigatório",
            'peso.max'=> "São permitidos 16 caracteres",
            'categoria_personalizado_id.required'=> "O: attribute é obrigatório",
        ]);

        Personalizado::create(
            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'peso'=> $request->peso,
            'categoria_personalizado_id'=>$request->categoria_personalizado_id,
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
        $dado = Personalizado::findOrFail($id);
        $categoria_personalizados = CategoriaPersonalizado::all();
        return view("personalizado.form", [
            'dado' => $dado,
            'categoria_personalizados' => $categoria_personalizados
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>"required|max:100",
            'contato'=>"nullable",
            'peso'=> "required|max:16",
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'peso.required'=> "O :attribute é obrigatório",
            'peso.max'=> "É permitido somente 100 unidades",
            'categoria_personalizado_id.required'=> "O: attribute é obrigatório",
        ]);

        Personalizado::updateOrCreate(
            [ 'id'=> $request->id],
            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'peso'=> $request->peso,
            'categoria_personalizado_id'=>$request-> categoria_personalizado_id,

        ]);


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
