<?php
    
namespace App\Http\Controllers;
    
use App\Models\ESCOLA;
use App\Models\FICHA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;


class EscolaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:escola-list|escola-create|escola-edit|escola-delete', ['only' => ['index','show']]);
         $this->middleware('permission:escola-create', ['only' => ['create','store']]);
         $this->middleware('permission:escola-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:escola-delete', ['only' => ['destroy']]);
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
        $ficha =  FICHA::where('status_id', '=', 'Auth()user()->id');
        $user =   Auth::user()->id;

          if ($ficha ) {
           $true = 1;

          }

          return view(
            'escola.index',
            [
                'ficha'        => $ficha,
                'escola'       => $escola,
                'user'         => $user,
                'true'         => $true,
                'userCount'    => $userCount
                
                
            ]
        );

           
    }
    
   public function create()
   {
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
       return view('escola.create', compact('userCount'));
   }
    

    public function store(Request $request)
    {

    
        ESCOLA::create($request->all());
    
         return redirect()->route('escola.index')
                         ->with('success','Escola cadastrada com sucesso!');
     }
    

    public function show(ESCOLA $escola)
    {
        return view('escola.show',compact('escola'));
    }
    

     public function edit(ESCOLA $escola)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('escola.edit',compact('escola','userCount'));
     }

     public function update(Request $request, ESCOLA $escola)
     {

         $escola->update($request->all());
    
         return redirect()->route('escola.index')
                         ->with('edit','Escola atualizada com sucesso!');
     }
    

     public function destroy(ESCOLA $escola)
     {
         $escola->delete();
         
         toast('Your Post as been submited!','success');

         return redirect()->route('escola.index')
                         ->with('delete','Escola deletada com sucesso!');
     }
 }