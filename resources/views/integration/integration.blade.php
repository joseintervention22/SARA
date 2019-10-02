@extends('layouts.plantilla')
@section('content')
@include('includes.message')

<div class="col-md-12">
@if ($errors->any())
@include('includes.errors')
@endif
<div class="box box-primary">
<div class="box-header with-border">
    <h4>Integre el fondo</h4>
</div>
<div class="box-body">
<form action="{{route('integration.store')}}" method="POST">
    @csrf
            <div class="form-group row">
                    <div class="col-sm-4">
                        <h4><label for="importefec">Importe en Efectivo</label></h4>
                        <input type="number" step="any" class="form-control"name="importefec"  id="importefec" value={{$arqueo->total_efectivo}} />
                    </div>

                    <div class="col-sm-4">
                            <h4><label for="vales">Vales de caja</label></h4>
                            <input type="text" name="vales" class="form-control" id="vales">
                        </div>
                    <div class="col-sm-4">
                        <h4><label for="importeche">Importe en Cheques</label></h4>
                        <input type="text" name="importeche" class="form-control" id="importeche" value="{{$arqueo->total_cheques}}">
                    </div>
            </div>
            <div class="form-group row">
                    <div class="col-sm-4">
                        <h4><label for="saldob">Saldo en Bancos Conciliado</label></h4>
                        <input type="text" name="saldob" class="form-control" id="saldob" value="0">
                    
                    </div>
                    <div class="col-sm-4">
                            <h4><label for="reembolsop">Reembolsos pendientes</label></h4>
                    <input type="text" name="reembolsop" class="form-control" id="reembolsop" value="{{$pendientes}}" readonly>
                        
                    </div>


                    <div class="col-sm-4">
                            <h4><label for="documentos">Documentos pagados</label></h4>
                    <input type="text" name="documentos" class="form-control" id="documentos" value="{{$pagados}}" readonly>
        
                    </div>


            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                        <h4><label for="otros">Otros Valores</label></h4>
                        <input type="text" name="otros" class="form-control" id="otros" value="0">
    



                </div>
                
            </div>
<!--
            <div class="form-group row">
                <div class="col-sm-4">
                        <h4><label for="comprobado">Total Comprobado</label></h4>
                        <input type="text" name="comprobado" class="form-control" id="comprobado" value="">
                </div>

                <div class="col-sm-4">
                        <h4><label for="fondo">Fondo Asignado</label></h4>
                        <input type="text" name="fondo" class="form-control" id="fondo" value="0">
                </div>

                <div class="col-sm-4">
                        <h4><label for="diferencia">Diferencia</label></h4>
                        <input type="text" name="diferencia" class="form-control" id="diferencia" value="0">
                </div>
            </div>
        -->
            <div class="form-group row">
                <div class="col-sm-6">
                <input type="hidden" name="arqueo_id" id="arqueo_id" class="form-group" value="{{$arqueo->id}}">

                <button type="submit" class="btn btn-primary pull-right ">Registrar</button>
                </div>

            </div>





    </form>
</div>

</div>
</div>
@endsection