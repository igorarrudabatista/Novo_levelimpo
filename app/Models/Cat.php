<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Cat extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */

protected $table = 'tb_categoria';

    protected $fillable = [
        'Categoria_Nome', 'Catregoria_Status'
    ];
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}