<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Exports\ClienteExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;


class ClientesController extends Controller
{
    public function create (){

        return view ('Clientes.form_empresa_cliente');

    }

    public function export () {
        
        $criar_empresa = Clientes::all();

        return Excel::download(new ClienteExport, 'clientes.xlsx');
      //  return Excel::download(new Empresa_Cliente, 'users.xlsx');
    }

    public function store (Request $request) {

        toast('Cliente criado com sucesso!','success');


        $criar_empresa_cliente =  new Clientes();

        $criar_empresa_cliente -> Nome_Empresa       = $request->Nome_Empresa;
        $criar_empresa_cliente -> Cnpj               = $request->Cnpj;
        $criar_empresa_cliente -> Email              = $request->Email;
        $criar_empresa_cliente -> Telefone           = $request->Telefone;
        $criar_empresa_cliente -> Site               = $request->Site;
        $criar_empresa_cliente -> Cidade             = $request->Cidade;
        $criar_empresa_cliente -> Endereco           = $request->Endereco;
        $criar_empresa_cliente -> Estado             = $request->Estado;
        $criar_empresa_cliente -> Cpf                = $request->Cpf;
        $criar_empresa_cliente -> Numero             = $request->Numero;
        $criar_empresa_cliente -> Cep                = $request->Cep;
        $criar_empresa_cliente -> Bairro             = $request->Bairro;
        $criar_empresa_cliente -> Instagram          = $request->Instagram;
        $criar_empresa_cliente -> Facebook           = $request->Facebook;




                // Imagem do produto upload
        if ($request->hasFile('image')&& $request->file('image')->isValid()){

            $requestImage = $request -> image;

            $extension = $requestImage-> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request -> image->move(public_path('img/empresa'), $imageName);

            $criar_empresa_cliente -> image = $imageName;

        }

        $criar_empresa_cliente ->save();

        $criar_empresa = Clientes::all();

        return redirect('/empresa/show_clientes');
    }

    public function show() {
        
   //     $criar_empresa = Clientes::all();

    //    $search = request('search');

        // if($search) {
        //     $criar_empresa = Clientes::where ([['Nome_Empresa', 'like', '%'.$search. '%' ]])->get();

        //      } else {
        //         $criar_empresa = Clientes::all();
        //     }
        
        // return view('Clientes.show_clientes', ['criar_empresa'=> $criar_empresa, 'search' => $search]);

        return view('Clientes.show_clientes');

    }

    public function edit ($id){


        $editar_empresa = Clientes::findOrFail($id);

        return view ('empresa.edit', ['editar_empresa'=> $editar_empresa]);



        // $editar_empresa = Empresa_cliente::findOrFail($id);

        // $titulo = "Edita Cliente";
        // $cliente = Empresa_cliente::find($id);

        // return view ('empresa.edit', ['editar_empresa'=> $editar_empresa, compact('titulo', 'cliente')]);


    }

    public function update (Request $request){
        
        
        $data = $request->all();

        
        // Imagem do produto upload
        if ($request->hasFile('image')&& $request->file('image')->isValid()){
            
            $requestImage = $request -> image;
            
            $extension = $requestImage-> extension();
            
            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $request -> image->move(public_path('img/empresa'), $imageName);
            
            $data['image'] = $imageName;
            
        }
        toast('Cliente editado com sucesso!','success');

        Clientes::findOrFail($request->id) -> update ($data);
     return redirect('/empresa/show_clientes');




    }



    public function destroy($id){
        
        toast('Cliente deletado com sucesso!','error');

        Clientes::findOrFail($id) -> delete();
        return redirect('/empresa/show_clientes');
    }

}
