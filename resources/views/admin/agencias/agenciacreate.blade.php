@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.errors')
        @include('includes.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Alta de Agencias</h3>
        </div>
    <div class="box-body">
    <form action="{{route('agencia.new')}}" method="post">

            @csrf
            <div class="form-group row">
                <div class="col-sm-4">
                    <h4><label for="agencia">Agencia</label></h4>
                    <input type="text" name="agencia" class="form-control" id="agencia" placeholder="EJ. Ixtepec">
                
                </div>
                <div class="col-sm-4">
                    <h4><label for="rff">Reesponsable del fondo fijo</label></h4>
                    <input type="text" name="rff" class="form-control" id="rff">
                
                </div>
                <div class="col-sm-4">
                    <h4><label for="rff">Fondo Fijo</label></h4>
                    <input type="text" name="fondo" class="form-control" id="fondo">
                
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-primary pull-right ">Registrar</button>
                </div>

            </div>



</form>


</div>
</div>
</div>          
@endsection