<?php
    
namespace App\Http\Controllers;
    
use App\Models\Prazo;
use Illuminate\Http\Request;
use App\Models\FICHA;

class PrazoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:prazo-list|prazo-create|prazo-edit|prazo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:prazo-create', ['only' => ['create','store']]);
         $this->middleware('permission:prazo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:prazo-delete', ['only' => ['destroy']]);
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
        
        $prazo = Prazo::latest()->paginate(10);
        return view('prazo.index',compact('prazo', 'userCount'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
       return view('prazo.create',compact('userCount'));
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
    
        Prazo::create($request->all());
    
         return redirect()->route('prazo.index')
                         ->with('success','Prazo criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Prazo $prazo)
    {
        return view('prazo.show',compact('prazo'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Prazo $prazo)
     {
         return view('prazo.edit',compact('prazo'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Prazo $prazo)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $prazo->update($request->all());
    
         return redirect()->route('prazo.index')
                         ->with('edit','Prazo Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Prazo $prazo)
     {
         $prazo->delete();
    
         return redirect()->route('prazo.index')
                         ->with('delete','Prazo deletado com sucesso!');
     }
 }