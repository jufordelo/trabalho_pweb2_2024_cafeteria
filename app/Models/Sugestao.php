<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    use HasFactory;

    protected $table = "sugestaos";
    protected $fillable = [
        "resp",
        "tel",
        "data",
        "hora",
        "pss",
        "cat_sugestao_id",
    ];
    protected $casts = [
        'cat_sugestao_id' => 'integer',
    ];
    public function categoria()
    {
        return $this->belongsTo(CatSugestao::class, 'cat_sugestao_id');
    }
}
