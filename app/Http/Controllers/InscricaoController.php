<?php

namespace App\Http\Controllers;
use App\Models\Inscricao;
use App\Models\CategoriaInscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{

    public function index()
   
    {  
        $dados= Inscricao::all();

        return view("inscricao.list", ["dados"=> $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria_inscricaos = CategoriaInscricao::all();

        return view("inscricao.form", ['categoria_inscricaos' => $categoria_inscricaos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:100",
            'insta' => "required|max:16",
            'categoria_inscricao_id' => "required",
            'telefone' => "nullable",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'insta.required' => "O :attribute é obrigatório",
            'insta.max' => "Só é permitido 16 caracteres",
            'categoria_inscricao_id.required' => "O :attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/inscricao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Inscricao::create(
            $request->all()
        );

        return redirect('inscricao');
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
        $dado = Inscricao::findOrFail($id);

        $categoria_inscricaos = CategoriaInscricao::all();

        return view("inscricao.form", [
            'dado' => $dado,
            'categoria_inscricaos' => $categoria_inscricaos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:100",
            'insta' => "required|max:16",
            'categoria_inscricao_id' => "required",
            'telefone' => "nullable",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'insta.required' => "O :attribute é obrigatório",
            'insta.max' => "Só é permitido 16 caracteres",
            'categoria_inscricao_id.required' => "O :attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/inscricao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Inscricao::updateOrCreate(
            ['id' => $request->id],
            [ 
            'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'insta'=> $request->insta,
            'categoria_inscricao_id'=>$request->categoria_inscricao_id,
        ]);
           
        return redirect('inscricao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Inscricao::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('inscricao');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Inscricao::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Inscricao::all();
        } //dd($dados)
             return view("inscricao.list",["dados"=> $dados]);

    }
}