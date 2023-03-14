<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Conselho extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */

protected $table = 'conselho';

    protected $fillable = [
        'ConselhoNome', 'ConselhoStatus' 
      
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}