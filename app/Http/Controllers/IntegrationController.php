<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arqueo;
use Illuminate\Support\Facades\Auth;
use App\Integration;
use App\Reembolso;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class IntegrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


        $usuario = Auth::id();
        $integraciones = Integration::where('user_id', '=', $usuario)->get();
        
        return view('integration.mainview' , compact('integraciones'));
    }

    public function chooseDate(){

        return view('integration.chooseDate');
    }

    public function sendDate(Request $request){

        $inicio = $request->input('inicio');
        $fin = $request->input('fin');

        $user = Auth::id();
        $selection = Arqueo::where('user_id','=',$user)->get();
    
        return view('integration.selection',compact('selection','inicio','fin'));
    


    }

    public function select(){

    $user = Auth::id();
    $selection = Arqueo::where('user_id','=',$user)->get();

    return view('integration.selection',compact('selection'));

    }

    public function create(Request $request){

        $user = Auth::id();
        $id = $request->input('id');
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');
        $arqueo = Arqueo::find($id);

        $pendientes = Reembolso::select('importe')
        ->whereBetween('fechac', [$inicio, $fin])
        ->where('estado','<=', 3)
        ->where('user_id','=', $user)
        ->sum('importe');        

        $pagados = Reembolso::select('importe')
        ->whereBetween('fechac', [$inicio, $fin])
        ->where('estado','=', 4)
        ->where('user_id','=', $user)
        ->sum('importe');        




        return view('integration.integration', compact('arqueo','pendientes','pagados'));

    }

    

    public function store(Request $request){
        $user = Auth::id();
        $validate = $this->validate($request,[
            
            'arqueo_id'  => 'required|integer'

        ]);


        $importefec  = $request->input('importefec');
        $importeche  = $request->input('importeche');
        $saldob      = $request->input('saldob');
        $reembolsop  = $request->input('reembolsop');
        $documentos  = $request->input('documentos');
        $otros       = $request->input('otros');
        $comprobado  = $importefec+$importefec+$saldob+$reembolsop+$documentos+$otros;
        $fondo       = 65000;
        $diferencia  = $comprobado-$fondo;
        $arqueo_id   = $request->input('arqueo_id');


        $integraciones = new Integration();
        $integraciones->importefec = $importefec;
        $integraciones->importeche = $importeche;
        $integraciones->saldob = $saldob;
        $integraciones->reembolsop = $reembolsop;
        $integraciones->documentos = $documentos;
        $integraciones->otros = $otros;
        
        
        $integraciones->comprobado = $comprobado;
        //ESTO ES UN EJEMPLO, ESTO PUEDE CAMBIAR
        $integraciones->fondo = $fondo;
        $integraciones->diferencia = $diferencia;
        $integraciones->arqueo_id = $arqueo_id;
        $integraciones->user_id = $user;

        $integraciones->save();


        return redirect()->route('integration.main')->with(['message' => 'Agregado correctamente']);




    }


    public function exportPdf($id){

        $integracion = Integration::find($id);
        
        $mil = $integracion->arqueo->mil * 1000;
        $quinientos = $integracion->arqueo->quinientos * 500;
        $doscientos = $integracion->arqueo->doscientos * 200;
        $cien = $integracion->arqueo->cien * 100;
        $cincuenta = $integracion->arqueo->cincuenta * 50;
        $veinte = $integracion->arqueo->veinte * 20;

        $diez = $integracion->arqueo->diez * 10;
        $cinco = $integracion->arqueo->cinco * 5;
        $dos = $integracion->arqueo->dos * 2;
        $uno = $integracion->arqueo->uno * 1;

        $cincuentacent = $integracion->arqueo->cincuenta_cent * 0.5;
        $veintecent = $integracion->arqueo->veinte_cent * 0.2;
        $diezcent = $integracion->arqueo->diez_cent * 0.1;
        $cincocent = $integracion->arqueo->cinco_cent * 0.05;



        $pdf = PDF::loadView('integration.report',compact('integracion','mil','quinientos'
        ,'doscientos','cien','cincuenta','veinte','diez','cinco','dos','uno','cincuentacent'
        ,'veintecent','diezcent','cincocent'))->setPaper('a4','landscape');
        return $pdf->stream('integracion.pdf');


    }



}
