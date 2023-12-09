<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $table = 'anexos';

    protected $fillable = [
        'id_chamado',
        'nome',
        'caminho'
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class, 'id_chamado', 'id');
    }
}
