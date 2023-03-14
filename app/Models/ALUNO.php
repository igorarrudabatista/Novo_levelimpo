<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ALUNO extends Model


{
    use HasFactory;
    protected $table = 'aluno';
    protected $fillable = [
         'AlunoNome',
         'AlunoDataNascimento',
         'AlunoCPF',
         'AlunoSexo',
         'AlunoFiliacao1',
         'AlunoFiliacao2',
         'AlunoEndereco',
         'AlunoNumero',
         'AlunoBairro',
         'AlunoCEP',
         'AlunoCidade',
         'AlunoEstado',
         'AlunoDDD',
         'AlunoTelefone',
         'AlunoObs',
        
     ];

    public function FICHA() {
        return $this->hasMany(FICHA::class);
        }      
     
}
