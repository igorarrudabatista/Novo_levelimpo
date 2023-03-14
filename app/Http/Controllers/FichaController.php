<?php
    
namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use App\Models\Conselho;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class FichaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ficha-list|ficha-create|ficha-edit|ficha-delete', 
                                                               ['only' => ['index','show']]);
         $this->middleware('permission:ficha-create',          ['only' => ['create','store']]);
         $this->middleware('permission:ficha-edit',            ['only' => ['edit','update']]);
         $this->middleware('permission:ficha-delete',          ['only' => ['destroy']]);
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
        $ficha = Ficha::with('cat', 'escola', 'aluno', 'user', 'users');
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
        $ficha =  FICHA::whereHas('User', function($query) {
        return $query->where('id', auth()->id());
        })->get();
    


              return view(
                'ficha.index',
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
        
    public function index_todas_fichas()
    {
        
          

        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        
        $ficha = Ficha::with('Cat', 'escola', 'aluno', 'user', 'users')->get();
        $users = User::all();
        $conselho = Conselho::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    // $ficha =  FICHA::whereHas('User', function($query) {
    //     return $query->where('id', auth()->id());
    // })->get();
    


              return view(
                'ficha.todasfichas',
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
   
    public function index_atender()
    {
             

        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();   
        $ficha = Ficha::with('cat', 'escola', 'aluno', 'user', 'users')->get();
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
                'ficha.index2',
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

  
   public function create($id)
   {
  //  $search = $request->input('search');

    $id_aluno = ALUNO::findOrFail($id);
    $ficha =       FICHA::with('cat', 'escola', 'aluno', 'user', 'users')->get();
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
    

    $user = User::pluck('name','id');
    $categoria = cat::all();
    $escola = ESCOLA::all();
    $aluno = ALUNO::all();


    return view(
        'ficha.create',
        [
            'categoria'    => $categoria,
            'escola'       => $escola,
            'aluno'        => $aluno,
            'user'         => $user,
            'userCount'    => $userCount,
            'ficha'        => $ficha,
            'id_aluno' =>     $id_aluno

        ]  );
   
   }
    
    public function store(Request $request)
    {

        FICHA::create($request->all());


         return redirect()->route('ficha.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    

    public function show(FICHA $ficha)
    {
        return view('ficha.show',compact('ficha'));
    }

     public function edit(FICHA $ficha)
     {

        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        $user = User::pluck('name','id');

        $categoria = Cat::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
        
         return view('ficha.edit',compact('ficha',
                                          'categoria',
                                          'escola',
                                          'aluno', 
                                          'user', 
                                          'userCount',
                                        ));
     }
    

     
    //  public function editconselho(FICHA $ficha, $id)
    //  {
    //     $user = User::get();
    //     $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
    //     $categoria = CATEGORIA::all();
    //     $escola = ESCOLA::all();
    //     $aluno = ALUNO::all();

    //     return view('ficha.editconselho', ['record' => FICHA::find($id)], compact('ficha','categoria','escola','aluno', 'user'));

    //     //  return view('ficha.editconselho',compact('ficha','categoria','escola','aluno', 'user'));
    //  }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, FICHA $ficha)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha->update($request->all());
    
         return redirect()->route('ficha.index')
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