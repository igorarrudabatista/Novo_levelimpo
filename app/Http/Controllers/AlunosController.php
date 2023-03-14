<?php

namespace App\Http\Controllers;

use App\Models\TBGERPESSOA;
use App\Models\ALUNO;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

use App\Models\FICHA;


use Illuminate\Support\Facades\Http;


class AlunosController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:aluno-list|aluno-create|aluno-edit|aluno-delete', ['only' => ['index','show']]);
         $this->middleware('permission:aluno-create', ['only' => ['create','store']]);
         $this->middleware('permission:aluno-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:aluno-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
            ->count();

        $aluno = ALUNO::get();

        return view(
            'aluno.index',
            [
                
                'aluno'        => $aluno,
                'userCount'    => $userCount
            ]
        );
    }   

    
    public Function search(Request $request) {

        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count(); 
        $search = $request->input('search');
        $response = ALUNO::query()
            ->where('AlunoCPF', 'LIKE', "%{$search}%")
            ->get();

      return view('painel.consulta_aluno', ['search'    => $search,
                                            'userCount' => $userCount,
                                            'response' => $response
                                        ]);

      }




   public function create()
   {
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();

    $search = request('search');
    $response = Http::post('http://consultaficai.des.seduc.mt.gov.br/rest/retornalistaalunos', [
        'chaveautenticacao' => '10221210000',
        'cpf' =>  $search
    ]);


    $result = '';


    $data = json_decode($response); // convert JSON into objects 

    return view('aluno.create', [
                 'search'    => $search,
                 'data'   =>$data,
                 'result' =>$result,
                 'userCount' => $userCount]);

   }
    

    public function store(Request $request)
    {
      
        ALUNO::create($request->all());
    
         return redirect()->route('aluno.index')
                         ->with('success','Aluno cadastrado com sucesso!');
    }
        

    public function edit(ALUNO $aluno)
    {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('aluno.edit',compact('aluno','userCount'));
    }

    public function update(Request $request, ALUNO $aluno)
    {
         $aluno->update($request->all());
    
         return redirect()->route('aluno.index')
                         ->with('edit','Aluno atualizado com sucesso!');
     }
    

     public function destroy(ALUNO $aluno)
     {
         $aluno->delete();
    
         return redirect()->route('aluno.index')
                         ->with('delete','Aluno deletado com sucesso!');
     }


     public function getAllStudents() {
        $students = Aluno::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
      }




      
}
