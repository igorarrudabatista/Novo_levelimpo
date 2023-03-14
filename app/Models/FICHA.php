<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;



class FICHA extends Model


{
    use SoftDeletes;
    use HasFactory;
    use Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $table = "ficha";

     protected $fillable = [
         'status_id',
         'categoria_id',
         'escola_id',
         'aluno_id',
         'Nome_resp_encaminhamento',
         'CPF_resp_encaminhamento',
         'Obs_motivo',
         'Data_comunica_responsaveis',
         'Nome_comunica_responsaveis',
         'Porquem_comunica_responsaveis',
         'CPF_comunica_responsaveis',
         'Telefone_comunica_responsaveis',
         'Paraquem_comunica_responsaveis',
         'Conselho_comunica_responsaveis',
         //conselho tutelar
         'Data_comunica_tutelar',
         'Nome_tutelar',
         'CPF_tutelar',
         'Obs_tutelar',
         ///ministerio
         'Data_ministerio_publico',
         'Nome_ministerio_publico',
         'CPF_ministerio_publico',
         'CPF_ministerio_publico'

        
     ];

      public function Cat() {
          return $this->belongsTo(Cat::class, 'categoria_id');
          
          }    
        
    public function escola() {
    return $this->belongsTo(ESCOLA::class, 'escola_id' );
            }    
           
    public function Aluno() {
    return $this->belongsTo(ALUNO::class, 'aluno_id');
            }    

    public function User() {
    return $this->belongsTo(User::class, 'created_by');
            }    
    public function Users() {
    return $this->belongsTo(User::class, 'status_id');
            }    
           
     
}
