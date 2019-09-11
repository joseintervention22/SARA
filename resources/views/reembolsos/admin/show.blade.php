@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Visualiza los reembolsos que se han solicitado</h3>
            <form class="navbar-form navbar-left pull-right" method="GET" action="{{route('reembolso.lista.ad.cons')}}" role="search"> 
    
                    <div class="form-group">
                        <input type="text" name="consecutivo" id="consecutivo" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-success">Buscar</button>
            </form>

        </div>
        <div class="box-body">

        <h4>Reembolsos por autorizar pago </h4>

       
        <table class="table table-hover table-bordered">
                <thead>
                    <tr>        
                        <th>Division</th>
                        <th>Reembolso Consecutivo</th>
                        <th>Registrado</th>
                        <th>Propietario de Fondo Fijo</th>
                        <th>Archivo</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reembolsos as $rm)
                    @if ($rm->estado==3)
                        <tr>
                        <td>B114-SB ZONA TEHUANTEPEC</td>
                        <td>{{$rm->consecutivo}}</td>
                        <td>{{$rm->user->name}}</td>
                        <td>{{$rm->agencia->rff}}</td>
                        <td><a href="{{route('reembolso.pdf',$rm->archivo)}}" download="{{route('reembolso.pdf',$rm->archivo)}}">descargar</a></td>
                        <td><a href="{{route('reembolso.admin.detalle',$rm->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-envelope"> </span>revisar</a>
                        
                        
                        </td>
                        </tr>
                        @endif


                    @endforeach


                </tbody>


        </table>
        {!! $reembolsos->render() !!}


        </div>

    </div>
</div>
@endsection