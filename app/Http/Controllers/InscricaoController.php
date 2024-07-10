<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use App\Models\CategoriaInscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Inscricao::all();
        return view("inscricao.list", ["dados" => $dados]);
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
        $request->validate([
            'nome' => 'required|max:100',
            'insta' => 'required|max:16',
            'categoria_inscricao_id' => 'required',
            'telefone' => 'nullable',
            'imagem' => 'nullable|image|mimes:png,jpeg,jpg',
        ], [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'nome.max' => 'O campo :attribute só pode ter até 100 caracteres.',
            'insta.required' => 'O campo :attribute é obrigatório.',
            'insta.max' => 'O campo :attribute só pode ter até 16 caracteres.',
            'categoria_inscricao_id.required' => 'O campo :attribute é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo PNG, JPEG ou JPG.',
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = 'imagem/inscricao/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Inscricao::create($data);

        return redirect('inscricao');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Não implementado neste exemplo
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dado = Inscricao::findOrFail($id);
        $categoria_inscricaos = CategoriaInscricao::all();
        return view("inscricao.form", compact('dado', 'categoria_inscricaos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'insta' => 'required|max:16',
            'categoria_inscricao_id' => 'required',
            'telefone' => 'nullable',
            'imagem' => 'nullable|image|mimes:png,jpeg,jpg',
        ], [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'nome.max' => 'O campo :attribute só pode ter até 100 caracteres.',
            'insta.required' => 'O campo :attribute é obrigatório.',
            'insta.max' => 'O campo :attribute só pode ter até 16 caracteres.',
            'categoria_inscricao_id.required' => 'O campo :attribute é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo PNG, JPEG ou JPG.',
        ]);

        $data = $request->all();

    }

}
