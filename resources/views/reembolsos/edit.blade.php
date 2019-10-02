@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @if ($errors->any())
            @include('includes.errors')
        @endif
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Actualice la informacion del reembolso</h3>
        </div>
        <div class="box-body">
        <form action="{{route('reembolso.update',$reembolsos->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            

            <div class="form-group row">
                    <div class="col-sm-8">
                        <label for="concepto">CONCEPTO</label>
                        <select name="concepto" id="concepto" class="js-example-basic-single" style="width: 100%;">
                            <option value="comisionista">Comisionista</option>
                        </select>
                    </div>
            
            </div>


            <div class="form-group row">
                    <div class="col-sm-8">
                        <label for="proveedor">Proveedor</label>
                    <input type="text" name="proveedor" class="form-control" id="proveedor" placeholder="registre al proveedor" value="{{$reembolsos->proveedor}}">

                        @if ($errors->has('proveedor'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('proveedor') }}</strong>

                    </div>

                    @endif
                    </div>
            
            </div>

            <div class="form-group row">
                    <div class="col-sm-8">
                        <label for="importe">IMPORTE</label>
                        <input type="number" step="0.001" name="importe" class="form-control" id="importe" placeholder="registre el importe total del reembolso" value="{{$reembolsos->proveedor}}">

                        @if ($errors->has('importe'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('importe') }}</strong>

                    </div>

                    @endif
                    </div>
            
            </div>
            
            <div class="form-group row">
                    <div class="col-sm-8">
                        <label for="agencia_id">Fecha de elaboracion</label>
                        <input type="text" name="fechac" id="fechac" class="form-control" value="{{$reembolsos->fechac}}">
                        @if ($errors->has('fechac'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('fechac') }}</strong>

                    </div>

                    @endif

                    </div>
            
            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                <label for="archivo">ARCHIVO</label>
                    <input type="file" name="archivo" class="form-control" id="archivo">
                    <p class="help-block">Seleccione un archivo </p>
                    @if ($errors->has('archivo'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('archivo') }}</strong>

                    </div>

                    @endif

                </div>
            
            </div>
            <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" value="{{$reembolsos->id}}">
            <input type="hidden" name="estado" class="form-control" id="estado" value="1">

            </div>

            <div class="form-group row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary ">Guardar</button>
                    </div>
                </div>





        </form>

        
        </div>
        
    
    
    </div>

</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
    $('.js-example-basic-single').select2();

    $('#fechac').datepicker({format: 'yyyy-mm-dd',
            locale: 'es-es'});


});

    
        
    
    </script>
@endsection