@extends('layouts.plantilla')
@section('content')

<div class="col-md-12">
@include('includes.message')
@include('includes.errors')

<div class="box box-primary">
<div class="box-header with-border">
<h3>Usuario {{$usuario->name}} {{$usuario->username}}</h3>
</div>
<div class="box-body">
    <div class="col-sm-8">
    <form action="{{route('user.refresh',$usuario->id)}}" method="post">
        @csrf
        <div class="form-group">
                <label>NIVEL</label>
                <select id="role" name="role"class="js-example-basic-single" style="width:100%;">
                  <option value="editor">Agencia</option>
                  <option value="revisor">Revision</option>
                  <option value="firma">Revision y firma</option>
                  <option value="pago">Administracion zona</option>
                  <option value="ofi_fin">Oficina de Finanza</option>

                </select>
            <input id="id" name="id" type="hidden" value="{{$usuario->id}}">
              </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary"> Guardar Cambios</button>
            </div>
            </form>
        </div>

</div>
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