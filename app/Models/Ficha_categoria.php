<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TB_FICHA extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function tb_ficha(){
        return $this->belongsTo(FICHA::class);
    }
    // public function tb_categoria(){
    //     return $this->belongsTo(CATEGORIA::class);
    // }
}
