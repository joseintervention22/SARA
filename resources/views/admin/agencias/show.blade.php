@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
@include('includes.message')
@include('includes.errors')
<div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Agencia {{$agencias->agencia}}</h3>
        </div>
        <div class="box-body">
        <form action="{{route('agencia.update',$agencias->id)}}" method="post">
            @csrf
                    <div class="form-group {{$errors->has('rff') ? 'has-error' : ''}}">
                            <div class="col-sm-6">
                                <label for="rff">Responsable del Fondo Fijo (RFF)</label>
                            <input type="text" name="rff" class="form-control" id="rff" placeholder="Teclee al Responsable" value="{{$agencias->rff}}">
                                    {!! $errors->first('rff','<span class="help-block">:message </span>') !!}
        
                            </div>
                            
                        </div>

                        <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="fondo">Fondo Fijo</label>
                                <input type="text" name="fondo" class="form-control" id="fondo" placeholder="Ingrese el fondo fijo" value="">
            
                                </div>
                                
                            </div>
                        <div class="form-group">
                            <div class="center-block">
                                <button style="margin-top: 30px; margin-left:500px;" type="submit" class="btn btn-primary">Guardar</button>
                            </div>


                        </div>
    
            </form>




        </div>
</div>
</div>
@endsection