<?php

namespace App\Http\Controllers;

use App\Agencia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index(){

        
    }


    public function user(){
        $usuarios = User::paginate(6);    


        return view('admin.users', compact('usuarios'));
    }

    public function detail($id){

        $usuario = User::find($id);


        return view('admin.userdetail', compact('usuario'));

    }

    public function edit($id){

        $usuario = User::find($id);

        return view('admin.userlevel', compact('usuario'));




    }

    public function agencias(){

        $agencias = Agencia::all();


        
        return view('admin.agencias.agencias',compact('agencias'));


    }

    public function agenciasEdit($id){

        $agencias = Agencia::find($id);


        return view('admin.agencias.show',compact('agencias'));


    }



    public function updateForm($id){

        $usuario = User::find($id);

        return view('admin.updateUser',compact('usuario'));



    }
    public function updateAgencia(Request $request, $id){
        
        $validate = $this->validate($request,[
            
            'rff'      => 'required|string|max:120',
            'fondo'    => 'required|numeric'
             
        ]);

        //OBTENGO LOS INPUT
        $agencia = Agencia::find($id);
        $rff     = $request->input('rff');
        $fondo   = $request->input('fondo');

        $agencia->rff   = $rff;
        $agencia->fondo = $fondo;
        $agencia->update();

        return redirect()->route('agencia.index')
        ->with(['message'=>'Informacion actualizada correctamente']);





    }

    public function showFormAgencia(){

        return view("admin.agencias.agenciacreate");
    }

    public function createAgencia(Request $request){

        $validate = $this->validate($request,[
            'agencia'  => 'required|string',
            'rff'      => 'required|string|max:120',
            'fondo'    => 'required|numeric'
             
        ]);
        //OBTENGO LOS INPUT
        $agencia = new Agencia();

        $name = $request->input("agencia");
        $rff  = $request->input("rff");
        $fondo = $request->input("fondo");

        $agencia->agencia = $name;
        $agencia->rff     = $rff;
        $agencia->fondo   = $fondo;
        
        $agencia->save();
        
        return redirect()->route('agencia.create')
        ->with(['message'=>'Agregado Correctamente']);



    }

    public function updateUser(Request $request, $id){


        $validate = $this->validate($request,[
            
            'name'      => 'required|string|max:120',
            'username'  => 'required|string|min:5',
            'email'     => 'required|email|max:120',
            'password'  => 'required|string|min:5|confirmed'
        ]);

        //OBTENGO LOS INPUT VALIDADOS
        $user     = User::find($id);
        $name     = $request->input('name');
        $username = $request->input('username');
        $email    = $request->input('email');
        $password = Hash::make($request->input('password'));



        $user->name     = $name;
        $user->username = $username;
        $user->email    = $email;
        $user->password = $password;

         //subir imagenes

        $image_path= $request->file('imagen');
        if($image_path){
            //nombre unico de la imagen
            $image_path_name = time().$image_path->getClientOriginalName();

            //guarda la imagen en la carpeta
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            $user->imagen = $image_path_name;

        }


        //ejecutar consulta y cambios en la base de datos
        $user->update();

        return redirect()->route('userslists')
        ->with(['message'=>'Usuario actualizado correctamente']);

    }

    public function updateRole(Request $request){

        $rol=$request->input('role');
        $usuario = $request->input('id');
        $user = User::where('id',$usuario)->first();
        $user->assignRole($rol);

        

        return redirect()->route('userslists')
               ->with(['message'=>'se ha actualizado el permiso']);

     

    }

    

}
