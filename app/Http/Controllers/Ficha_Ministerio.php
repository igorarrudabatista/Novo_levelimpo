<?php
    
namespace App\Http\Controllers;

use App\Models\CATEGORIA;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use App\Models\Conselho;
use Spatie\Permission\Models\Role;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class Ficha_Ministerio extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ficha_ministerio-list|ficha_ministerio-create|ficha_ministerio-edit|ficha_ministerio-delete', 
                                                               ['only' => ['index','show']]);
         $this->middleware('permission:ficha_ministerio-create',          ['only' => ['create','store']]);
         $this->middleware('permission:ficha_ministerio-edit',            ['only' => ['edit','update']]);
         $this->middleware('permission:ficha_ministerio-delete',          ['only' => ['destroy']]);
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
            $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
            $users = User::all();
            $conselho = Conselho::all();
         // $categoria = CATEGORIA::with('ficha')->get();
            $escola = ESCOLA::all();
            $aluno = ALUNO::all();
        
        //  $ficha =  FICHA::whereHas('User', function($query) {
        //      return $query->where('id', auth()->id());
        //  })->get();
    
         $ficha =  FICHA::where('status_id', '=', auth()->id())
         ->get();
        
    
    
                  return view(
                    'ficha_ministerio.index',
                    [
                        'ficha'        => $ficha,
                        'escola'       => $escola,
                        'conselho'     => $conselho,
                        'aluno'        => $aluno,
                        'users'        => $users,
                        'userCount'    => $userCount
                    ]
                );
            }
    
   
  
   public function create()
   {

    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
    $user = User::get();
    $categoria = CATEGORIA::all();
    $escola = ESCOLA::all();
    $aluno = ALUNO::all();

       return view('ficha_ministerio.create', compact('categoria','escola','aluno','user', 'userCount'));
   }
    
    public function store(Request $request)
    {

        // FICHA::create($request->all());
        $ficha_ministerio =  new FICHA;

        
        $ficha_ministerio -> Data_comunica_tutelar       = $request->Data_comunica_tutelar;
        $ficha_ministerio -> Nome_tutelar       = $request->Nome_tutelar;
        $ficha_ministerio -> CPF_tutelar       = $request->CPF_tutelar;

        $ficha_ministerio->save();

         return redirect()->route('ficha_ministerio.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    

    public function show(FICHA $ficha)
    {
        return view('ficha_ministerio.show',compact('ficha'));
    }



    public function edit(FICHA $ficha_ministerio)
     {
        $user = User::pluck('name','id');
        $perfis = Role::all()->pluck('name');
        $perfil =Role::whereNotIn('name', ['Admin', 'Conselho'])->pluck('name');

        $perfil_escola= User::role('Escola')->pluck('name', 'id');
        $perfil_MP= User::role('Ministério Público')->pluck('name','id');
        $categoria = CATEGORIA::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();

        
        
         return view('ficha_ministerio.edit',compact('ficha_ministerio','perfil_escola','perfil_MP','perfil','perfis','categoria','escola','aluno', 'user'));
     }
    

     
     public function update(Request $request, FICHA $ficha_ministerio)
     {
      
         $ficha_ministerio->update($request->all());
    
         return redirect()->route('ficha_ministerio.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
     public function update2(Request $request, FICHA $ficha)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha->update($request->all());
    
         return redirect()->route('ficha.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(FICHA $ficha)
     {
         $ficha->delete();
    
         return redirect()->route('ficha.index')
                          ->with('delete','Ficha deleta com sucesso!');
     }

     public function Conselho1(Request $request, $id)    {

        $ficha = FICHA::find($id);
        //$users = User::findOrFail($id);
      //  $conselho1 = $users;
        $ficha -> FichaStatus = $ficha;
        $ficha -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
          return redirect('/ficha');
      }
    public function Conselho2(Request $request, $id) 
       {
    
   

         $user = FICHA::find($id); 
         $user -> status_id = $user->id;
         $user -> save();
             



          return redirect('/ficha');
      }
    public function Conselho3(Request $request, $id)    {
    
        $ficha = FICHA::find($id);
        $conselho3 = 'Conselho3';
        $ficha -> FichaStatus   = $conselho3;
        $ficha -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
          return redirect('/ficha');
      }
 }