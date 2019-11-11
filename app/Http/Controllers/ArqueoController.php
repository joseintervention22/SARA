<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agencia;
use Illuminate\Support\Facades\Auth;
use App\Arqueo;
class ArqueoController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
}

public function index(){

$agencias = Agencia::all();

    return view('arqueos.arqueo',compact('agencias'));
}

public function show(){
    $user = Auth::id();

    $arqueos = Arqueo::where('user_id','=',$user)->get();

    return  view('arqueos.mainview',compact('arqueos'));

}



public function store(Request $request){

    $user = Auth::id();

    $validate = $this->validate($request,[
        'mil'         => 'integer',
        'quinientos'  => 'integer',
        'doscientos'  => 'integer',
        'cien'        => 'integer',
        'cincuenta'   => 'integer',
        'veinte'      => 'integer',
        'diez'        => 'integer',
        'cinco'       => 'integer',
        'dos'         => 'integer',
        'uno'         => 'integer',
        'cincuenta_cent'  => 'integer',
        'veinte_cent' => 'integer',
        'diez_cent'   => 'integer',
        'cinco_cent'  => 'integer',
        'mes'         => 'required',
        'arqueo_id'   => 'required',
        'agencia_id'  => 'required'

        

    ]);



    $mil = $request->input('mil');
        $quinientos = $request->input('quinientos');
        $doscientos = $request->input('dociento');
        $cien = $request->input('cien');
        $cincuenta = $request->input('cincuenta');
        $veinte = $request->input('veinte');
        $diez = $request->input('diez');
        $cinco = $request->input('cinco');
        $dos = $request->input('dos');
        $uno = $request->input('uno');
        $cincuenta_cent = $request->input('cincuenta_cent');
        $veinte_cent = $request->input('veinte_cent');
        $diez_cent = $request->input('diez_cent');
        $cinco_cent = $request->input('cinco_cent');
        
        $total_efectivo= $mil*1000+$quinientos*500+$doscientos*200+$cien*100+$cincuenta*50+$veinte*20+$diez*10+$cinco*5+$dos*2+$uno*1+$cincuenta_cent*0.5+$veinte_cent*0.2+$diez_cent*0.1+$cinco_cent*0.05;
        
        #$total_efectivo = $request->input('total_efectivo');
        $total_cheques = $request->input('total_cheques');
        $total = $total_efectivo+$total_cheques;
        //$total = $request->input('total');
        $mes = $request->input('mes');
        $arqueo_id = $request->input('arqueo_id');
        $agencia_id = $request->input('agencia_id');



        $arqueo = new Arqueo();
        $arqueo->mil = $mil;
        $arqueo->quinientos = $quinientos;
        $arqueo->doscientos = $doscientos;
        $arqueo->cien = $cien;
        $arqueo->cincuenta = $cincuenta;
        $arqueo->veinte = $veinte;
        $arqueo->diez = $diez;
        $arqueo->cinco = $cinco;
        $arqueo->dos = $dos;
        $arqueo->uno = $uno;
        $arqueo->cincuenta_cent = $cincuenta_cent;
        $arqueo->veinte_cent = $veinte_cent;
        $arqueo->diez_cent = $diez_cent;
        $arqueo->cinco_cent = $cinco_cent;
        $arqueo->total_efectivo = $total_efectivo;
        $arqueo->total_cheques = $total_cheques;
        $arqueo->total = $total;
        $arqueo->mes = $mes;
        $arqueo->arqueo_id = $arqueo_id;
        $arqueo->agencia_id = $agencia_id;
        $arqueo->user_id = $user;


        $arqueo->save();
        return redirect()->route('arqueo.main')->with(['message' => 'Agregado correctamente']);		




}


}
