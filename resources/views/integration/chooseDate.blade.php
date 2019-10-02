@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @if ($errors->any())
            @include('includes.errors')
        @endif
        @include('includes.message')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Seleccione el rango de tiempo del fondo fijo</h3>
            </div>
            <div class="box-body">
            <form action="{{route('integration.send')}}" method="post">
                @csrf
                    <div class="form-group">
                            <div class="col-sm-6">
                                <label for="agencia_id">Fecha de Inicio</label>
                            <input type="text" name="inicio" id="inicio" class="form-control" value="">
    
                            </div>
                    
                    </div>
                    <div class="form-group">
                            <div class="col-sm-6">
                                <label for="agencia_id">Fecha de Termino</label>
                            <input type="text" name="fin" id="fin" class="form-control" value="">
    
                            </div>
                    
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                        <button class="btn btn-primary pull-right" style="margin-top: 15px;"> Siguiente</button>
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
        $('#inicio').datepicker({format: 'yyyy-mm-dd',locale: 'es-es'});
        $('#fin').datepicker({format: 'yyyy-mm-dd',locale: 'es-es'});



});

    
    
    
    </script>
@endsection