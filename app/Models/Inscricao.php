<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = "inscricao";
    //app/Models/
    protected $fillable = [
        "nome",
        "telefone",
        "insta",
        "categoria_inscricao_id",
        "imagem",
    ];

    protected $casts = [
        'categoria_inscricao_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(CategoriaInscricao::class, 'categoria_inscricao_id');
    }
}