<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class ESCOLA extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */

protected $table = 'escola';

    protected $fillable = [
        'EscolaCod', 'EscolaNome', 'EscolaEndereco', 
        'EscolaNumero', 'EscolaBairro', 'EscolaCep', 
        'EscolaCidade', 'EscolaEstado', 
        'EscolaDDD', 'EscolaTel', 'EscolaEmail',
        'EscolaStatus'

    ];
     public function users()
     {
         return $this->belongsToMany(User::class);
     }
     public function FICHA()
     {
         return $this->hasMany(FICHA::class);
     }

}