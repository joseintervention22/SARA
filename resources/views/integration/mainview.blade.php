@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
    @if ($errors->any())
        @include('includes.errors')
    @endif
    @include('includes.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Integracion del Fondo</h3>
            <a href="{{route('integration.select')}}" class="btn btn-sm btn-primary pull-right">Registrar nuevo</a>
        </div>
        <div class="box-body">

        </div>
    </div>
</div>
@endsection