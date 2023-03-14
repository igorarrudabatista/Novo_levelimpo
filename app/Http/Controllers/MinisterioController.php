<?php
    
namespace App\Http\Controllers;
    
use App\Models\Ministerio;
use Illuminate\Http\Request;
use App\Models\FICHA;

class MinisterioController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ministerio-list|ministerio-create|ministerio-edit|ministerio-delete', ['only' => ['index','show']]);
         $this->middleware('permission:ministerio-create', ['only' => ['create','store']]);
         $this->middleware('permission:ministerio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ministerio-delete', ['only' => ['destroy']]);
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

        $ministerio = Ministerio::get();

        return view(
            'ministerio.index',
            [
                'ministerio'   => $ministerio,
                'userCount'    => $userCount
                
                
            ]
        );
       
    }
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   { $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();

       return view('ministerio.create',compact('userCount'));
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
    
        Ministerio::create($request->all());
    
         return redirect()->route('ministerio.index')
                         ->with('success','Ministerio criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Ministerio $ministerio)
    {
        return view('ministerio.show',compact('ministerio'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Ministerio $ministerio)
     {
         return view('ministerio.edit',compact('ministerio'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Ministerio $ministerio)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ministerio->update($request->all());
    
         return redirect()->route('ministerio.index')
                         ->with('edit','Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Ministerio $ministerio)
     {
         $ministerio->delete();
    
         return redirect()->route('ministerio.index')
                         ->with('delete','Ministério deletado com sucesso!');
     }
 }