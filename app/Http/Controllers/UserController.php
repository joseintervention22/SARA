<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function profile(){
        $usuario = Auth::user();

        return view('user.profile',compact('usuario'));
    }

    public function edit(){
        return view('user.edit');
    }

    public function update(Request $request){

         //consigo al usuario
         $user = \Auth::user();
         $id = $user->id;
        //validacion del formulario
         $validate = $this->validate($request,[
             'name' => 'required|string',
             'username' => 'required|string',
             'email' => 'required|string|email'
 
         ]);

         $id = \Auth::user()->id;
         $name = $request->input('name');
         $username = $request->input('username');
         $email = $request->input('email');
        
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        
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

        return redirect()->route('user.profile')
        ->with(['message'=>'Usuario actualizado correctamente']);

             


    }
    public function getImage($filename){

        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }




}
