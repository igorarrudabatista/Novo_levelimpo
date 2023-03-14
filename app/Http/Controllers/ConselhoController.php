<?php
    
namespace App\Http\Controllers;
    
use App\Models\Conselho;
use Illuminate\Http\Request;
use App\Models\FICHA;

    
class ConselhoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    function __construct()
    {
         $this->middleware('permission:conselho-list|conselho-create|conselho-edit|conselho-delete', ['only' => ['index','show']]);
         $this->middleware('permission:conselho-create', ['only' => ['create','store']]);
         $this->middleware('permission:conselho-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:conselho-delete', ['only' => ['destroy']]);
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
        $conselho = Conselho::latest()->paginate(5);
        return view('conselho.index',compact('conselho', 'userCount'))
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
       return view('conselho.create',compact('userCount'));



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
    
        Conselho::create($request->all());
    
         return redirect()->route('conselho.index')
                         ->with('success','Conselho criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Conselho $conselho)
    {
        return view('conselho.show',compact('conselho'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Conselho $conselho)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('conselho.edit',compact('conselho', 'userCount'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Conselho $conselho)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $conselho->update($request->all());
    
         return redirect()->route('conselho.index')
                         ->with('edit','Conselho Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Conselho $conselho)
     {
         $conselho->delete();
    
         return redirect()->route('conselho.index')
                         ->with('delete','Conselho deletado com sucesso!');
     }
 }