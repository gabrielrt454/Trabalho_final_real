<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $table = 'tecnologia';
    protected $fillable = ['tecnologias_nome'];
    
    public function jogos()
    {
        return $this->hasMany(Jogo::class);
    }
}
