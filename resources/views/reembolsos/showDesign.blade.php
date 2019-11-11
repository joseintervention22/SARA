@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.message')

</div>
<div class="col-md-2">
    <a href="{{route('reembolso.create')}}" class="btn btn-primary btn-block margin-bottom">Nuevo</a>
</div>
    
<div class="col-md-10">
    <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Reembolsos</h3>
        <form class="navbar-form navbar-left pull-right" method="GET" action="{{route('reembolso.search')}}" role="search"> 
    
                <div class="form-group">
                    <input type="text" name="consecutivo" id="consecutivo" class="form-control input-sm" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-search"></span> buscar
                </button>
        </form>
    </div>
        <div class="box-body no-padding">
                <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                          <tbody>
                              @foreach ($reembolsos as $rm)
                                  
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td class="mailbox-star"><i class="fa fa-star text-yellow"></i></td>
                                    <td class="mailbox-name"><a href="{{route('reembolso.detail',$rm->id)}}">Reembolso Num.{{$rm->consecutivo}}</a></td>
                                    <td class="mailbox-subject"><b>{{$rm->agencia->rff}}</b> - 
                                        @if ($rm->estado==1)
                                        Registrado en revision {{$rm->fechac}}
                                        @elseif($rm->estado==2)
                                        Revisado en espera de firma {{$rm->updated_at}}
                                        @elseif($rm->estado==3)
                                        autorizado en espera de finanza {{$rm->updated_at}}
                                        @elseif($rm->estado==4)
                                        Revisado en espera de programar el pago {{$rm->updated_at}}
                                        @elseif($rm->estado==5)
                                        Revisado se programo el pago{{$rm->updated_at}}
                                        @elseif($rm->estado==6)
                                        PAGADO-{{$rm->updated_at}}
                        
                        
                        
                        
                
                                        @elseif($rm->estado==7)
                                        Reembolso Rechazado superintendencia {{$rm->updated_at}}
                                        @elseif($rm->estado==8)
                                        No se Aprobo el Reembolso {{$rm->updated_at}}
                                        @elseif($rm->estado==9)
                                        No se Autorizo en Finanzas {{$rm->updated_at}}
                                        @elseif($rm->estado==10)
                                        se rechazo el pago en Finanzas {{$rm->updated_at}}
                        
                                        @endif
                                    </td>
                                    <td><a href="{{route('reembolso.pdf',$rm->archivo)}}" download="{{route('reembolso.pdf',$rm->archivo)}}">descargar</a></td>
                                    <td class="mailbox-date">{{$rm->comentario}}</td>

                                    @if ($rm->estado==6)
                                        <td></td>
                                    @else
                                    <td><a class="btn btn-xs btn-success" href="{{route('reembolso.actualizar',$rm->id)}}">
                                        <span class="glyphicon glyphicon-pencil"> </span>editar</a>  
                                    </td>

                                    @endif
                                    
                                    
                                   
                                    
                                </tr>
                                @endforeach

                          </tbody>
                        </table>
                        {!! $reembolsos->render() !!}

                </div>
        </div>




    </div>
    </div>


@endsection