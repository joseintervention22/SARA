@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Configuracion de Cuenta</h3>
           
        <form id="formupdate" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" >
                {{csrf_field()}}
            <br />
                
            <div class="box-body">

                

                  <div class="form-group">
                        <label for="name">Nombre</label>
                      <input type="text" name="name" required="required" class="form-control" id="name" placeholder="ingrese su nombre" value="{{Auth()->user()->name}}">
                  </div>
                            
                  <div class="form-group">
                      <label for="username">RPE</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="ingrese RPE" value="{{Auth()->user()->username}}">
                  </div>
                        
                        <div class="form-group">
      
                          <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="ingrese su email" value="{{Auth()->user()->email}}">
                  
                      
                      </div>

                
                  <div class="form-group">
                    <label for="imagen">Foto</label>
                    @if(Auth::user()->imagen)
                    <img src="{{ route('user.avatar',['filename' => Auth::user()->imagen]) }}" class="img-circle" style="width:100px"/>
  
                    @endif
                    <input type="file" name ="imagen" id="imagen">
  
                    <p class="help-block">Seleccione una imagen </p>
                  </div>
                  
                </div>
                <!-- /.box-body -->
                <div class="form-group">
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
              </form>
            </div>
        </div>
    </div>
</div>
    
@endsection