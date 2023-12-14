<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'chamados';
    protected $fillable = [
        'descricao',
        'status',
        'titulo',
        'id_funcionario',
        'prioridade',
        'fechado_em'
    ];

    public function createdBy() {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }
    public function acoes(){
        return $this->hasMany(HistoricoAcao::class, 'id_chamado', 'id');
    }
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamentos::class);
    }
    public function tecnicos() 
    {
        return $this->hasManu(Tecnico::class, 'id_chamado', 'id');
    }
    public function anexos() 
    {
        return $this->hasMany(Anexo::class,'id_chamado','id');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    
}
