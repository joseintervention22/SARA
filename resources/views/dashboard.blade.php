@extends('layouts.plantilla')

@section('content')
<div class="col-md-9">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">BIENVENIDO(a)</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
            <img src="{{asset("images/DSC08232-min(2).jpg")}}" alt="Suminstro Tehuantepec">

              <div class="carousel-caption">
                <h5>Suministrador de Servicios Basicos</h5>
                <p>Zona Tehuantepec </p>
              </div>
            </div>
            <div class="item">
              <img src="{{asset("images/DSC08263.jpg")}}" alt="Second slide">

              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
            <img src="{{asset("images/DSC08265.jpg")}}" alt="Third slide">

              <div class="carousel-caption">


            </div>
            </div>
            <div class="item">
                <img src="{{asset("images/DSC08288.jpg")}}" alt="Third slide">
    
                  <div class="carousel-caption">


                </div>
                </div>
                <div class="item">
                    <img src="{{asset("images/Istmo_Tehuantepec_Oaxaca2.jpg")}}" alt="Third slide">
        
                      <div class="carousel-caption">


                    </div>
                    </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection


