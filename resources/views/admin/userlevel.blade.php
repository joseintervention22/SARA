@extends('layouts.plantilla')
@section('content')
@include('includes.message')

<div class="col-md-12">
@if ($errors->any())
@include('includes.errors')
@endif
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
                <select id="role" name="role"class="form-control">
                  <option value="editor">Agencia</option>
                  <option value="revisor">Revision</option>
                  <option value="firma">Revision y firma</option>
                  <option value="pago">Administracion zona</option>
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