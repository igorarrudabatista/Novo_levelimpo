<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_Ministerio extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "ficha_conselho";

     protected $fillable = [
         'data_encaminhamento',
         'Nome_Responsavel',
         'CPF_Responsavel',
         'ficha_id',
        
     ];
}
