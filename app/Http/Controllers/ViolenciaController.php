<?php
    
namespace App\Http\Controllers;
    
use App\Models\ESCOLA;
use App\Models\FICHA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;


class ViolenciaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:violencia-list|violencia-create|violencia-edit|violencia-delete', ['only' => ['index','show']]);
         $this->middleware('permission:violencia-create', ['only' => ['create','store']]);
         $this->middleware('permission:violencia-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:violencia-delete', ['only' => ['destroy']]);
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
        $escola = ESCOLA::get();


        //$ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
   //  $ficha =  FICHA::get();
          $ficha =  FICHA::where('status_id', '=', 'Auth()user()->id');
          $user =   Auth::user()->id;

          if ($ficha ) {
           $true = 1;

          }
          
        //   $ficha =  FICHA::where('status_id', '=', auth()->id())
        //     ->get();

          
    


          return view(
            'violencia_escolar.index',
            [
                'ficha'        => $ficha,
                'escola'       => $escola,
                'user'         => $user,
                'true'         => $true,
                'userCount'    => $userCount
                
                
            ]
        );

      //  return view('escola.index',compact('escola','ficha','user'));
           
    }
    
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
       return view('violencia_escolar.create', compact('userCount'));
   }
    
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
    public function store(Request $request)
    {
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        ESCOLA::create($request->all());
    
         return redirect()->route('violencia_escolar.index')
                         ->with('success','Escola cadastrada com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(ESCOLA $escola)
    {
        return view('violencia_escolar.show',compact('escola'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(ESCOLA $escola)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('violencia_escolar.edit',compact('escola','userCount'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, ESCOLA $escola)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $escola->update($request->all());
    
         return redirect()->route('violencia_escolar.index')
                         ->with('edit','Escola atualizada com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(ESCOLA $escola)
     {
         $escola->delete();
         
         toast('Your Post as been submited!','success');

         return redirect()->route('violencia_escolar.index')
                         ->with('delete','Escola deletada com sucesso!');
     }
 }