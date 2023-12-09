<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoAcao extends Model
{
    use HasFactory;
    protected $table = 'historico_acoes';
    
    protected $fillable = [
        'tipo_acao',
        'descricao'
    ];

    public function chamado()
    {
        return $this>belongsTo(Chamado::class, 'id_chamado', 'id');
    }
}
