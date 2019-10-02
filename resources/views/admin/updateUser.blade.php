@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.message')
        @include('includes.errors')


    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Configuracion de Cuenta</h3>
           
        <form id="formupdate" method="POST" action="{{ route('user.admin.update',$usuario->id) }}" enctype="multipart/form-data" >

            @csrf
            <br />
                
            <div class="box-body">

                

                  <div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
                        <label for="name">Nombre</label>
                      <input type="text" name="name" required="required" class="form-control" id="name" placeholder="ingrese su nombre" value="{{$usuario->name}}">
                      {!! $errors->first('name','<span class="help-block">:message </span>') !!}

                  </div>
                            
                  <div class="form-group{{$errors->has('username') ? 'has-error' : ''}}">
                      <label for="username">RPE</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="ingrese RPE" value="{{$usuario->username}}">
                        {!! $errors->first('username','<span class="help-block">:message </span>') !!}

                    </div>
                        
                        <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
      
                          <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="ingrese su email" value="{{$usuario->email}}">
                        {!! $errors->first('email','<span class="help-block">:message </span>') !!}

                      
                      </div>

                      <div class="form-group{{$errors->has('password') ? 'has-error' : ''}}">
                        <label for="password">Contraseña</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="ingrese una nueva contraseña" value="{{$usuario->password}}">
                          {!! $errors->first('password','<span class="help-block">:message </span>') !!}

                    </div>
                    <div class="form-group{{$errors->has('password') ? 'has-error' : ''}}">
                        <label for="password">Confirme la Contraseña</label>
                          <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="confirme la nueva contraseña" >
                          {!! $errors->first('password','<span class="help-block">:message </span>') !!}

                    </div>
                
                  <div class="form-group{{$errors->has('imagen') ? 'has-error' : ''}}">
                    <label for="imagen">Foto</label>
                    @if($usuario->imagen)
                    <img src="{{ route('user.avatar',['filename' => $usuario->imagen]) }}" class="img-circle" style="width:100px"/>
  
                    @endif
                    <input type="file" name ="imagen" id="imagen">
  
                    <p class="help-block">Seleccione una imagen </p>
                    {!! $errors->first('imagen','<span class="help-block">:message </span>') !!}

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