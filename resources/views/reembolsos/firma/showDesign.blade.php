@extends('layouts.plantilla')
@section('content')
        <div class="col-md-12">
                @include('includes.message')
        </div>


<div class="col-md-2">
        <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Revision</h3>
    
                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a><i class="fa fa-inbox"></i> revise
                                    <span class="label label-primary pull-right">{{count($reembolsos)}}</span></a></li>
                                    <li><a><i class="fa fa-envelope-o"></i> Firme</a></li>
                                    <li><a><i class="fa fa-file-text-o"></i> Envie Correccion</a></li>

                        </ul>
                </div>    
        </div>
    </div>
        
    <div class="col-md-10">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Reembolsos</h3>
            <form class="navbar-form navbar-left pull-right" method="GET" action="{{route('reembolso.lista.f.consecutivo')}}" role="search"> 
        
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
                                    @if ($rm->estado==2)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="mailbox-star"><i class="fa fa-star text-yellow"></i></td>
                                        <td class="mailbox-name"><a href="{{route('reembolso.firma.detalle',$rm->id)}}">Reembolso Num.{{$rm->consecutivo}}</a></td>
                                        <td class="mailbox-subject"><b>{{$rm->agencia->rff}}</b> - {{$rm->user->name}} - {{$rm->agencia->agencia}}
                                        </td>
                                        <td><a href="{{route('reembolso.pdf',$rm->archivo)}}" download="{{route('reembolso.pdf',$rm->archivo)}}">descargar</a></td>
                                        <td class="mailbox-date">{{$rm->comentario}}</td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
    
                              </tbody>
                            </table>
                            {!! $reembolsos->render() !!}
    
                    </div>
            </div>
    
    
    
    
        </div>
        </div>
    



@endsection