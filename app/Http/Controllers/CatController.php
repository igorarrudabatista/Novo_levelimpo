<?php
    
namespace App\Http\Controllers;
    
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Models\FICHA;

    
class CatController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    function __construct()
    {
         $this->middleware('permission:cat-list|cat-create|cat-edit|cat-delete', ['only' => ['index','show']]);
         $this->middleware('permission:cat-create', ['only' => ['create','store']]);
         $this->middleware('permission:cat-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:cat-delete', ['only' => ['destroy']]);
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
        $cat = Cat::get();

        
        return view(
            'cat.index',
            [
                'cat'        => $cat,
                'userCount'   => $userCount
                
                
            ]
        );
   
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
       return view('cat.create',compact('userCount'));
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
    
        Cat::create($request->all());
    
         return redirect()->route('cat.index')
                         ->with('success','Polo criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Cat $cat)
    {
        return view('cat.show',compact('cat'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Cat $cat)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('cat.edit',compact('cat', 'userCount'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Cat $cat)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $cat->update($request->all());
    
         return redirect()->route('cat.index')
                         ->with('edit','Cat Atualiazada com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Cat $cat)
     {
         $cat->delete();
    
         return redirect()->route('cat.index')
                         ->with('delete','Polo deletado com sucesso!');
     }
 }