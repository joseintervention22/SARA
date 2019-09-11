<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Agencia;
use App\Reembolso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Mail\ReembolsoCreated;
use Illuminate\Support\Facades\Mail;
class ReembolsoController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');



    }

    public function create(){

        $agencias = Agencia::all();

        return view('reembolsos.create',compact('agencias') ); 


    }

    public function store(Request $request){

        $user = Auth::id();

        
        $validate = $this->validate($request,[
            'consecutivo' => 'required|integer|unique:reembolsos',
            'concepto'    => 'required|string',
            'proveedor'   => 'required|string',
            'importe'     => 'required|numeric',
            'agencia_id'  => 'required|integer',
            'fechac'      => 'required|date',
            'estado'      => 'required|integer',
            'archivo'     => 'required|mimes:docx,pdf',

        ]);
        

        //recogemos los datos

        $consecutivo  = $request->input('consecutivo');
        $concepto     = $request->input('concepto');
        $proveedor    = $request->input('proveedor');
        $importe      = $request->input('importe');
        $agencia      = $request->input('agencia_id');
        $fecha        = $request->input('fechac');
        $estado       = $request->input('estado');

       
        


        //asigna los valores

        $reembolsos = new Reembolso();
        $reembolsos->consecutivo = $consecutivo;
        $reembolsos->concepto    = $concepto;
        $reembolsos->proveedor   = $proveedor;
        $reembolsos->importe     = $importe;
        $reembolsos->agencia_id  = $agencia;
        $reembolsos->fechac      = $fecha;
        $reembolsos->estado      = $estado;
        $reembolsos->user_id     = $user;


        $archivo = $request->file('archivo');


        if($archivo){
            
            $archivo_ruta = time().$archivo->getClientOriginalName();
            Storage::disk('reembolsos')->put($archivo_ruta, File::get($archivo));
            
            $reembolsos->archivo = $archivo_ruta;


        }


        $reembolsos->save();
        //Mail::to('joseintervention@gmail.com')->send(new ReembolsoCreated($reembolsos));
        return redirect()->route('reembolso.create')->with(['message' => 'Agregado correctamente']);



    
    
    
    }

    public function show(Request $request){

        $usuario = Auth::id();
        $responsable = DB::table('reembolsos')->join('agencias','agencias.id','=','reembolsos.agencia_id')
        ->select('agencias.rff')->get();

        $reembolsos = Reembolso::consecutivo($request->get('consecutivo'))
        ->orderBy('id')
        ->where('user_id',$usuario)
        ->paginate(3);
        return view('reembolsos.show',compact('reembolsos','reesponsable'));



    }


    public function getReembolso($filename){
        $file = Storage::disk('reembolsos')->get($filename);

        //return new Response($file,200);

        return response()->download(storage_path("app/reembolsos/{$filename}"));


    }


    
    public function detalle($id){
        $usuario = Auth::id();
        $reembolso = Reembolso::find($id);
        
        
        $descripcion = DB::table('reembolsos')
        ->join('agencias','agencias.id','=','reembolsos.agencia_id')
        ->get();

        return view('reembolsos.detail',compact('reembolso','descripcion'));


    }

    public function update($id){


        $reembolsos = Reembolso::find($id);
        

        return view('reembolsos.edit', compact('reembolsos'));
    }

    public function actualizar(Request $request, $id){

        $reembolsos = Reembolso::find($id);
        $user = Auth::id();
        
        $validate = $this->validate($request,[
            'concepto'    => 'required|string',
            'proveedor'   => 'required|string',
            'importe'     => 'required|numeric',
            'fechac'      => 'required|date',
            'archivo'     => 'required',

        ]);


        $id           = $request->input('id');
        $concepto     = $request->input('concepto');
        $proveedor    = $request->input('proveedor');
        $importe      = $request->input('importe');
        $fecha        = $request->input('fechac');

            

        $reembolsos->id          = $id;
        $reembolsos->concepto    = $concepto;
        $reembolsos->proveedor   = $proveedor;
        $reembolsos->importe     = $importe;
        $reembolsos->fechac      = $fecha;
        $reembolsos->user_id     = $user;


        $archivo = $request->file('archivo');


        if($archivo){
            
            $archivo_ruta = time().$archivo->getClientOriginalName();
            Storage::disk('reembolsos')->put($archivo_ruta, File::get($archivo));
            
            $reembolsos->archivo = $archivo_ruta;


        }


        $reembolsos->update();
        return redirect()->route('reembolso.show')
        ->with(['message' => 'Agregado se han actualizado los datos correctamente']);




    }



    
    public function getAllReembolsos(Request $request){

        $reembolsos = Reembolso::consecutivo($request->get('consecutivo'))->
        paginate(3);


        return view('reembolsos.showall',compact('reembolsos'));

    }


    public function revisa($id){
        $reembolso = Reembolso::find($id);

        return view('reembolsos.revision1.revision1', compact('reembolso'));


    }

    public function aprobar1(Request $request){

        $estado = $request->input('estado');
        $num = $request->input('num');
       
        $reembolso = Reembolso::find($num);
        $reembolso->estado = $estado;
        $reembolso->save();
       

        return redirect()->route('reembolso.all')
               ->with(['message'=>'se ha aprovado el reembolso y se paso a firma']);
       





    }

    public function firma(Request $request){
        $reembolsos = Reembolso::consecutivo($request->get('consecutivo'))->
        paginate(3);


        return view('reembolsos.firma.show',compact('reembolsos'));


    }



    public function firmarev($id){

        $reembolso = Reembolso::find($id);

        return view('reembolsos.firma.detalle', compact('reembolso'));

    }

    public function firmar(Request $request){
        $estado = $request->input('estado');
        $num = $request->input('num');
       
        $reembolso = Reembolso::find($num);
        $reembolso->estado = $estado;
        $reembolso->save();
       

        return redirect()->route('reembolso.lista.firma')
               ->with(['message'=>'se ha firmado el reembolso y se paso a la administracion']);
       

    }


    //PARTE DEL PAGO DE LA ADMINISTRACION

    public function administracion(Request $request){
        $reembolsos = Reembolso::consecutivo($request->get('consecutivo'))->
        paginate(3);


        return view('reembolsos.admin.show',compact('reembolsos'));


    }


    public function admindetalle($id){
        $reembolso = Reembolso::find($id);

        return view('reembolsos.admin.detalle', compact('reembolso'));
    }

    public function pagar(Request $request){
        $estado = $request->input('estado');
        $num = $request->input('num');
       
        $reembolso = Reembolso::find($num);
        $reembolso->estado = $estado;
        $reembolso->save();
       

        return redirect()->route('reembolso.lista.admin')
               ->with(['message'=>'se ha autorizado el pago del reembolso']);
       

    }


    public function revision(){

        $revisados = Reembolso::where('estado','>=',2)->get();

        return view('reembolsos.revision1.reviewed',compact('revisados'));



    }


    
    public function firmados(){

        $firmados = Reembolso::where('estado','>=',3)->get();

        return view('reembolsos.firma.reviewed',compact('firmados'));



    }


    public function administrados(){

        $administrados = Reembolso::where('estado','>=',4)->get();

        return view('reembolsos.admin.reviewed',compact('administrados'));



    }

    


    
}
