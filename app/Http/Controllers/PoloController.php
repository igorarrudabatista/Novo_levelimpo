<?php
    
namespace App\Http\Controllers;
    
use App\Models\Polo;
use Illuminate\Http\Request;
use App\Models\FICHA;

    
class PoloController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    function __construct()
    {
         $this->middleware('permission:polo-list|polo-create|polo-edit|polo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:polo-create', ['only' => ['create','store']]);
         $this->middleware('permission:polo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:polo-delete', ['only' => ['destroy']]);
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
        $polo = Polo::get();

        
        return view(
            'polo.index',
            [
                'polo'        => $polo,
                'userCount'   => $userCount
                
                
            ]
        );
        return view('polo.index',compact('polo', 'userCount'))
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
       return view('polo.create',compact('userCount'));
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
    
        Polo::create($request->all());
    
         return redirect()->route('polo.index')
                         ->with('success','Polo criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Polo $polo)
    {
        return view('polo.show',compact('polo'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Polo $polo)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('polo.edit',compact('polo', 'userCount'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Polo $polo)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $polo->update($request->all());
    
         return redirect()->route('polo.index')
                         ->with('edit','Polo Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Polo $polo)
     {
         $polo->delete();
    
         return redirect()->route('polo.index')
                         ->with('delete','Polo deletado com sucesso!');
     }
 }