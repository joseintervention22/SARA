@extends('layouts.plantilla')
@section('content')
@include('includes.message')

        
    <div class="col-md-10">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Reembolsos</h3>
        </div>
            <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                              <tbody>
                                  @foreach ($pagar as $rm)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="mailbox-star"><i class="fa fa-star text-yellow"></i></td>
                                        <td class="mailbox-name"><a href="{{route('reembolso.pago.detalle',$rm->id)}}">Reembolso Num. {{$rm->consecutivo}}</a></td>
                                        <td class="mailbox-subject"><b>{{$rm->agencia->rff}}</b> - {{$rm->user->name}} - {{$rm->agencia->agencia}}
                                        </td>
                                        <td><a href="{{route('reembolso.pdf',$rm->archivo)}}" download="{{route('reembolso.pdf',$rm->archivo)}}">descargar</a></td>
                                        
                                    </tr>
                                    @endforeach
    
                              </tbody>
                            </table>
                            {!! $pagar->render() !!}
    
                    </div>
            </div>
    
    
    
    
        </div>
        </div>
    



@endsection