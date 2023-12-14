<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $fillable = [
        'nome',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}

