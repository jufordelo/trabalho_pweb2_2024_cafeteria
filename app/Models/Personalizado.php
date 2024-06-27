<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizado extends Model
{
    use HasFactory;

    protected $table = "personalizados";
    //app/Models/
    protected $fillable = [
        "nome",
        "contato",
        "peso",
        "categoria_id",
    ];
    protected $casts=[
        'categoria_id'=>'integer'
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');//tabela interior da relação
    }
}


