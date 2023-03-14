<?php

namespace App\Http\Controllers;
use App\Models\TBGERPESSOA;
use App\Models\FICHA;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
public function index() {

    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();

    $search = request('search');

    if ($search) {
        $pessoa = TBGERPESSOA::where([['GerPesNom',   'like', '%' . $search . '%']])->get();
    } else {
        $pessoa = TBGERPESSOA::limit(10);
    }
 //  $pessoa = \DB::connection('sqlsrv')->table('GER.TBGERPESSOA')->get();
  // $users = DB::connection('pgsql')->select(...);

 // $pessoa = TBGERPESSOA::limit(5);
   //$pessoa = TBGERPESSOA::get();
  // $pessoa = TBGERPESSOA::select('GER.TBGERPESSOA')->where('GerPesNom', 'Igor de Arruda Batista')->first(); 
 //  $pessoa = \DB::connection('sqlsrv')->select('select * from GER.TBGERPESSOA where GerPesNom like %igor%');
 // dd($pessoa);
   return view('escola.teste', compact('pessoa', 'search', 'userCount'));

}


}
