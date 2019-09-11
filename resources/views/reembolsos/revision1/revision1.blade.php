@extends('layouts.plantilla')

@section('content')
<section class="invoice">

        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header"><i class="fa fa-globe"></i> Reembolso
                    <small class="pull-right">Detalles del reembolso</small></h2>
    
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Propietario de Fondo Fijo
              <address>
              <strong>{{$reembolso->agencia->rff}} </strong><br>
              Fecha de Registro: {{$reembolso->fechac}}<br>

              </address>
            </div>
        
            <div class="col-sm-4 invoice-col">
                
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
              <b>Reembolso consecutivo: {{$reembolso->consecutivo}}</b><br>
              <b>Division: </b>B114-SB ZONA TEHUANTEPEC<br>
              <b>Asignacion: </b>B114<br>
              </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-hover table-striped">
                <thead>
                        <th>Nombre del Proveedor</th>
                        <th>Concepto de Gasto</th>
                        <th>Importe Total</th>
                        <th>Registrado por</th>
                        <th>Agencia</th>
    
                </thead>
                <tbody>
                        
                   <tr>

                   <td>{{$reembolso->proveedor}}</td>
                   <td>{{$reembolso->concepto}}</td>
                   <td> ${{$reembolso->importe}}</td>
                   <td>{{$reembolso->user->username}}   {{$reembolso->user->name}}</td>
                   <td>{{$reembolso->agencia->agencia}}</td>

                   </tr>

                </tbody>
    
    
    
              </table>
    
            </div>
    
        </div>
    
        <div class="row no-print">
                <div class="col-xs-12">
                <form method="POST" action="{{route('reembolso.aprobar1')}}">
                    @csrf
                <input type="hidden" class="form-control" name="num" id="num" value="{{$reembolso->id}}">
                   <input type="hidden" class="form-control" name="estado" id="estado" value="2">
                  <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-legal"></i> Aprobar Reembolso
                  </button>
                </form>
                </div>
              </div>
    
    </section>
    
@endsection