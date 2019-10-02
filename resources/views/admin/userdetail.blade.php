@extends('layouts.plantilla')
@section('content')
    <div class="col-md-8">
            @include('includes.message')

            <div class="box box-primary">
                    <div class="box-body box-profile">
        
                      @if($usuario->imagen)
                      <img src="{{ route('user.avatar',['filename' => $usuario->imagen]) }}" class="profile-user-img img-responsive img-circle"/>
          
                        @endif  
                    <h3 class="profile-username text-center">{{$usuario->name}}</h3>
        
                    <p class="text-muted text-center">{{$usuario->username}} </p>
        
                      <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>EMAIL</b><b class="fa fa-envelope">:</b> <a class="pull-right">{{$usuario->email}}</a>
                            </li>
                            <li class="list-group-item">
                            <a href="{{route('user.detalle.update',$usuario->id)}}" class="btn btn-primary btn-block">Actualizar Usuario</a>
                            </li>
                      </ul>
        
                    </div>
                    <!-- /.box-body -->
                  </div>
                  
          <!-- About Me Box -->
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">MI INFORMACION</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> COMISION FEDERAL DE ELECTRICIDAD</strong>
    
                  <p class="text-muted">
                      SUMINISTRADOR DE SERVICIOS BASICOS
                </p>
    
                  <hr>
    
                  <strong><i class="fa fa-map-marker margin-r-5"></i> PERTENECIENTE</strong>
    
                  <p class="text-muted">ZONA COMERCIAL TEHUANTEPEC</p>
    <!--
                  <hr>
    
                  <strong><i class="fa fa-pencil margin-r-5"></i>Habilidad</strong>
    
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>
    
                  <hr>
                -->


<!--
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
    
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
            -->
                <!-- /.box-body -->
              </div>

    </div>
    </div>

@endsection