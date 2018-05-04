<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
     // define os dados que podem ser alterados da tabela produtos
     protected $fillable = ['raca','proprietario','peso','valor'];

     // para indicar que os campos create_at e update_at nao estao sendo utilizados nesta tabela
 
     public $timestamps = false;
}
