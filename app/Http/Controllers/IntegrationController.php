<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arqueo;
use Illuminate\Support\Facades\Auth;
use App\Integration;

class IntegrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('integration.mainview');
    }

    public function select(){

    $user = Auth::id();
    $selection = Arqueo::where('user_id','=',$user)->get();

    return view('integration.selection',compact('selection'));

    }

    public function create($id){

        $arqueo = Arqueo::find($id);
        
        return view('integration.integration', compact('arqueo'));

    }

    public function store(Request $request){
        $user = Auth::id();
        $validate = $this->validate($request,[
            
            'arqueo_id'  => 'required|integer',
            'comprobado' => 'required|numeric',
            'fondo'      => 'required|numeric',
            'diferencia' => 'required|numeric' 

        ]);


        $importefec  = $request->input('importefec');
        $importeche  = $request->input('importeche');
        $saldob      = $request->input('saldob');
        $reembolsop  = $request->input('reembolsop');
        $documentos  = $request->input('documentos');
        $otros       = $request->input('otros');
        $comprobado  = $request->input('comprobado');
        $fondo       = $request->input('fondo');
        $diferencia  = $request->input('diferencia');
        $arqueo_id   = $request->input('arqueo_id');


        $integraciones = new Integration();
        $integraciones->importefec = $importefec;
        $integraciones->importeche = $importeche;
        $integraciones->saldob = $saldob;
        $integraciones->reembolsop = $reembolsop;
        $integraciones->documentos = $documentos;
        $integraciones->otros = $otros;
        $integraciones->comprobado = $comprobado;
        $integraciones->fondo = $fondo;
        $integraciones->diferencia = $diferencia;
        $integraciones->arqueo_id = $arqueo_id;
        $integraciones->user_id = $user;

        $integraciones->save();


        return redirect()->route('integration.main')->with(['message' => 'Agregado correctamente']);




    }



}
