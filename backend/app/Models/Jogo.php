<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;
    protected $table = 'jogos';//na verdade esse informações é o jogo
    protected $fillable = ['tecnologia_id','nome','preset','fps'];//Um jogo possui o nome(jogo) preset e fps tem
                            /**Mudar para jogo :
                            [nome_jogo,preset_jogo,etc]**/


    public function tecnologia()
    {
        return $this->belongsTo(Tecnologia::class);
    }
}
