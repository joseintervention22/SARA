@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
@if ($errors->any())
    @include('includes.errors')
@endif
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Reembolsos revisados</h3>
    </div>
    <div class="box-body">

        <table class="table table-hover table-bordered">

            <thead>
                    <tr>        
                        <th>Reembolso Consecutivo</th>
                        <th>Propietario Fondo Fijo</th>
                        <th>importe</th>
                        <th>Estado</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
            </thead>

            <tbody>
                    @foreach ($firmados as $reviewed)
                    <tr>

                        <td>{{$reviewed->consecutivo}}</td>
                        <td>{{$reviewed->agencia->agencia}}</td>
                        <td>{{$reviewed->importe}}</td>
                        @if ($reviewed->estado==1)
                        <td>Registrado en revision<br>{{$reviewed->fechac}}</td>
                        @elseif($reviewed->estado==2)
                        <td>Revisado en espera de firma<br>{{$reviewed->updated_at}}</td>
                        @elseif($reviewed->estado==3)
                        <td>Firmado en espera de revision en la administracion<br>{{$reviewed->updated_at}}</td>
                    
                        @elseif($reviewed->estado==4)
                        <td>Revisado a pagar<br>{{$reviewed->updated_at}}</td>

                        @endif
                    </tr>
                    @endforeach


            </tbody>





        </table>




    </div>





</div>


</div>
@endsection