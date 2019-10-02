@extends('layouts.plantilla')
@section('content')
<div class="col-md-10">
        @include('includes.message') 
        @include('includes.errors')
    <div class="box  box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Capture el reembolso</h3>
        </div>

        <div class="box-body">
        <form method="POST" action="{{route('reembolso.store')}}" enctype="multipart/form-data">
            @csrf
                
                <div class="form-group {{$errors->has('consecutivo') ? 'has-error' : ''}}">
                    <div class="col-sm-8">
                        <label for="consecutivo">REEMBOLSO CONSECUTIVO</label>
                            <input type="number" name="consecutivo" class="form-control" id="consecutivo" placeholder="seleccione el consecutivo del reembolso" value="{{old('consecutivo')}}">
                            {!! $errors->first('consecutivo','<span class="help-block">:message </span>') !!}
                    </div>
                    
                </div>
               
                


                <div class="form-group">
                        <div class="col-sm-4">
                            <label for="concepto">CONCEPTO</label>
                            <select name="concepto" id="concepto" class="js-example-basic-single" style="width: 100%;">
                                <option value="comisionista">Comisionista</option>
                                <option value="PAGO PSI">PAGO PSI</option>
                                <option value="PAGO COMBUSTIBLE">PAGO COMBUSTIBLE</option>
                                <option value="PAGO LIMPIEZA">PAGO LIMPIEZA</option>
                                <option value="PAGO REPARTO">PAGO REPARTO</option>
                                <option value="PAGO PERIFONEO">PAGO PERIFONEO</option>

                            </select>
                        </div>
                
                </div>


                <div class="form-group {{$errors->has('proveedor') ? 'has-error' : ''}}"">
                        <div class="col-sm-8">
                            <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" id="proveedor" placeholder="registre al proveedor" value="{{old('proveedor')}}">
                        {!! $errors->first('proveedor','<span class="help-block">:message </span>') !!}

                        </div>
                
                </div>

                <div class="form-group {{$errors->has('importe') ? 'has-error' : ''}}"">
                        <div class="col-sm-4">
                            <label for="importe">IMPORTE</label>
                        <input type="number" step="0.1" name="importe" class="form-control" id="importe" placeholder="registre el importe total del reembolso" value="{{old('importe')}}">
                        {!! $errors->first('importe','<span class="help-block">:message </span>') !!}

                        </div>
                
                </div>


                <div class="form-group">
                        <div class="col-sm-8">
                            <label for="agencia_id">Agencia</label>
                            <select name="agencia_id" id="agencia_id" class="js-example-basic-single" style="width: 100%;">
                                @foreach ($agencias as $agencia)
                            <option value={{$agencia->id}}>{{$agencia->agencia}}</option>
                                @endforeach
                            </select>
                        </div>
                
                </div>

                <div class="form-group">
                        <div class="col-sm-4">
                            <label for="agencia_id">Fecha de elaboracion</label>
                        <input type="text" name="fechac" id="fechac" class="form-control" value="{{date('Y-m-d H:i:s')}}" readonly="readonly">

                        </div>
                
                </div>
    
                <div class="form-group {{$errors->has('archivo') ? 'has-error' : ''}}"">
                    <div class="col-sm-12">
                    <label for="archivo">ARCHIVO</label>
                        <input type="file" name="archivo" class="form-control" id="archivo" value="{{old('importe')}}">
                        <p class="help-block">Seleccione un archivo </p>
                        {!! $errors->first('archivo','<span class="help-block">:message </span>') !!}


                    </div>
                
                </div>

               


                <div class="form-group">
                        <input type="hidden" name="estado" class="form-control" id="estado" value="1">
                </div>



                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block ">Guardar</button>
                    </div>
                </div>
            </form>

        </div>


    </div>
</div>
<div class="col-sm-2 pull-right">
        <div class="callout callout-info">
                <h4 class="box-title">Registre sus reembolsos</h4>
                <p>por favor proporcione los datos que se le solicitan</p>
        </div>
        
</div>
@endsection
@section('script')
    <script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();


});

    
    
    
    </script>
@endsection