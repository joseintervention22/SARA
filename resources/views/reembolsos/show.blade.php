@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
@include('includes.message')
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Visualiza los reembolsos que se han solicitado</h3>
        <form class="navbar-form navbar-left pull-right" method="GET" action="{{route('reembolso.search')}}" role="search"> 
    
            <div class="form-group">
                <input type="text" name="consecutivo" id="consecutivo" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-success">
                
                
                    <span class="glyphicon glyphicon-search"></span> buscar
            
            
            </button>
    </form>
</div>


<div class="box-body">
        
<table class="table table-hover table-bordered">
        <thead>
            <tr>        
                <th>Reembolso Consecutivo</th>
                <th>Asignacion</th>
                <th>Propietario Fondo Fijo</th>
                <th>Archivo</th>
                <th>Estado</th>
                <th>Comentario</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reembolsos as $rm)
            <tr>
                <td>{{$rm->consecutivo}}</td>
                <td>B114</td>
                <td>{{$rm->agencia->rff}}</td>
                <td><a href="{{route('reembolso.pdf',$rm->archivo)}}" download="{{route('reembolso.pdf',$rm->archivo)}}">descargar</a></td>
                @if ($rm->estado==1)
                <td>Registrado en revision<br>{{$rm->fechac}}</td>
                @elseif($rm->estado==2)
                <td>Revisado en espera de firma<br>{{$rm->updated_at}}</td>
                @elseif($rm->estado==3)
                <td>Firmado en espera de admin<br>{{$rm->updated_at}}</td>
                @elseif($rm->estado==4)
                <td>Revisado a pagar<br>{{$rm->updated_at}}</td>


                @elseif($rm->estado==5)
                <td>Reembolso Rechazado<br>{{$rm->updated_at}}</td>
                @elseif($rm->estado==6)
                <td>No se Aprobo el Reembolso<br>{{$rm->updated_at}}</td> 
                @elseif($rm->estado==7)
                <td>No se Autorizo en Administracion<br>{{$rm->updated_at}}</td>

                @endif
                <td>{{$rm->comentario}}</td>
                <td><a href="{{route('reembolso.detail',$rm->id)}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-envelope"> </span>detalle</a>


                    {{-- <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit">
                        
                            <span class="glyphicon glyphicon-pencil"></span> editar
                    
                    </button> --}}
                <a class="btn btn-xs btn-success" href="{{route('reembolso.actualizar',$rm->id)}}">
                    <span class="glyphicon glyphicon-pencil"> </span>editar</a>  
                </td>
            </tr>

            @endforeach


        </tbody>


</table>

{!! $reembolsos->render() !!}

</div>

</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <form action="" method="">
                <div class="modal-body">

                    
            <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="concepto">CONCEPTO</label>
                        <select name="concepto" id="concepto" class="form-control">
                            <option value="comisionista">Comisionista</option>
                        </select>
                    </div>
            
            </div>


            <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="proveedor">Proveedor</label>
                    <input type="text" name="proveedor" class="form-control" id="proveedor" placeholder="registre al proveedor" value="">

                      
                    </div>
            
            </div>

            <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="importe">IMPORTE</label>
                        <input type="number" step="0.1" name="importe" class="form-control" id="importe" placeholder="registre el importe total del reembolso">

                    
                    </div>
            
            </div>
            
            <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="agencia_id">Fecha de elaboracion</label>
                        <input type="text" name="fechac" id="fechac" class="form-control">

                    </div>
            
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                <label for="archivo">ARCHIVO</label>
                    <input type="file" name="archivo" class="form-control" id="archivo">
                    <p class="help-block">Seleccione un archivo </p>
                   
                </div>
            
            </div>
            <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" value="">
            </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>

    </div>


</div>


@endsection