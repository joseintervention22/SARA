@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @include('includes.message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <h3 class="box-title">Por favor corrija los errores debajo</h3>
            </div>
        @endif
        <div class="box box-primary">
        <div class="box-header with-border">
            <!--    <h3 class="box-title">Rellene la informacion que se le solicita</h3>    -->
            <form method="POST" action="{{route('arqueo.create')}}">
            @csrf
            <div class="form-group row">
            <div class="col-sm-4">
                <h4><label for="arqueo_id">No. ARQUEO DE CAJA</label></h4>
                <input type="text" name="arqueo_id" class="form-control" id="arqueo_id" placeholder="ingrese el numero de arqueo" value="">
            </div>    
            

    <div class="col-sm-4">
        <h4><label for="agencia_id">AGENCIA</label></h4>
        <select name="agencia_id" id="agencia_id" class="js-example-basic-single" style="width: 100%;">
          @foreach ($agencias as $agencia)
      <option value={{$agencia->id}}>{{$agencia->agencia}}</option>
          @endforeach
      </select>
     </div>    
            <div class="col-sm-4">
                <h4><label for="mes">MES A REPORTAR</label></h4>
                <input type="text" name="mes" class="form-control" id="mes" placeholder="ingrese el mes o algo asi" value="">
            </div>
            </div>
        </div>
        <div class="box-body">

                <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              BILLETES</a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                
                                        <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="mil">Billetes de $1000</label>
                                                        <input type="number" name="mil" class="form-control" id="mil" value="0" >
                                                  
                                                </div>
                                                <div class="col-sm-6">
                                                        <label for="quinientos">Billetes de $500</label>
                                                            <input type="number" name="quinientos" class="form-control" id="quinientos" value="0" >
                                                      
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="doscientos">Billetes de $200</label>
                                                        <input type="number" name="dociento" class="form-control" id="dociento" value="0" >
                                                  
                                                </div>
                                                <div class="col-sm-6">
                                                        <label for="cien">Billetes de $100</label>
                                                            <input type="number" name="cien" class="form-control" id="cien" value="0" >
                                                      
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="cincuenta">Billetes de $50</label>
                                                        <input type="number" name="cincuenta" class="form-control" id="cincuenta" value="0" >
                                                  
                                                </div>
                                                <div class="col-sm-6">
                                                        <label for="veinte">Billetes de $20</label>
                                                            <input type="number" name="veinte" class="form-control" id="veinte" value="0" >
                                                      
                                                </div>
                                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Moneda</a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                    <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="diez">Monedas de $10</label>
                                                    <input type="number" name="diez" class="form-control" id="diez" value="0">
                                              
                                            </div>
                                            <div class="col-sm-6">
                                                    <label for="cinco">monedas de $5</label>
                                                        <input type="number" name="cinco" class="form-control" id="cinco" value="0">
                                                  
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="dos">Monedas de $2</label>
                                                    <input type="number" name="dos" class="form-control" id="dos" value="0">
                                              
                                            </div>
                                            <div class="col-sm-6">
                                                    <label for="uno">monedas de $1</label>
                                                        <input type="number" name="uno" class="form-control" id="uno" value="0">
                                                  
                                            </div>
                                    </div>

                        
                        
                        </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              Moneda Fraccionada</a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">

                                    <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="cincuenta_cent">Monedas de $00.50 centavos</label>
                                                    <input type="number" name="cincuenta_cent" class="form-control" id="cincuenta_cent" value="0">
                                              
                                            </div>
                                            <div class="col-sm-6">
                                                    <label for="veinte_cent">Monedas de $00.20 centavos</label>
                                                        <input type="number" name="veinte_cent" class="form-control" id="veinte_cent" value="0">
                                                  
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="diez_cent">Monedas de $00.10 centavos</label>
                                                    <input type="number" name="diez_cent" class="form-control" id="diez_cent" value="0">
                                              
                                            </div>
                                            <div class="col-sm-6">
                                                    <label for="cinco_cent">Monedas de $00.05 centavos</label>
                                                        <input type="number" name="cinco_cent" class="form-control" id="cinco_cent" value="0">
                                                  
                                            </div>
                                    </div>


                        </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    CHEQUES</a>
                                  </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                  <div class="panel-body">
      
                                          <div class="form-group row">
                                                  <div class="col-sm-6">
                                                      <label for="importe_cheques">IMPORTE DE CHEQUES</label>
                                                          <input type="text" name="importe_cheques" class="form-control cs" id="importe_cheques" value="0" onChange="totalCheques();">
                                                  </div>
                                                  
                                          </div>
                              </div>
                                </div>
                              </div>
                      </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="total_cheques">IMPORTE TOTAL DE CHEQUES</label>
                            <input type="text" name="total_cheques" class="form-control im" id="total_cheques" value="0" onChange="sumaTotal();" readonly="readonly">
                        </div>    
                        <div class="col-sm-6">
                            <label for="total_efectivo">IMPORTE TOTAL EN EFECTIVO</label>
                            <input type="text" name="total_efectivo" class="form-control im" id="total_efectivo" value="0" onChange="sumaTotal();" readonly="readonly">
                        </div>
                        <div class="col-sm-6">
                            <label for="total">IMPORTE TOTAL</label>
                            <input type="text" name="total" class="form-control" id="total" value="0" readonly="readonly">
                        </br></br>
                        </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" >Guardar</button>
                            </div>
                        </div>
                    </form>
        </div>       
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
   /**
   
    //Calcular Importe Total de Cheques
    function totalCheques() {
      var add = 0;
      $('.cs').each(function() {
          if (!isNaN($(this).val())) {
              add = Number($(this).val());
          }
      });
      $('#total_cheques').val(add);

      sumaTotal();
    };

    //Calcular Importe tortal en Efectivo

    //para 1000

    
    function totalEfectivo1() {
      var mil = 1000;  
      $('.efectivo1').each(function() {
          if (!isNaN($(this).val())) {
              mil *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(mil);
      sumaTotal();
    };

    //para 500
    function totalEfectivo2() {
      var add = 500; 
      $('.efectivo2').each(function() {
          if (!isNaN($(this).val())) {
              add *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(add);
      sumaTotal();
    };

    //para 200
    function totalEfectivo3() {
      var add = 200; 
      $('.efectivo3').each(function() {
          if (!isNaN($(this).val())) {
              add *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(add);
      sumaTotal();
    };

    //para 100
    function totalEfectivo4() {
      var add = 100; 
      $('.efectivo4').each(function() {
          if (!isNaN($(this).val())) {
              add *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(add);
      sumaTotal();
    };

    //para 50
    function totalEfectivo5() {
      var add = 50; 
      $('.efectivo5').each(function() {
          if (!isNaN($(this).val())) {
              add *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(add);
      sumaTotal();
    };

    //para 20
    function totalEfectivo6() {
      var add = 20; 
      $('.efectivo6').each(function() {
          if (!isNaN($(this).val())) {
              add *= Number($(this).val());
          }
      });
      $('#total_efectivo').val(add);
      sumaTotal();
    };


    //Calcular el importe total
    function sumaTotal() {
      var add = 0;
      $('.im').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#total').val(add);
   };

*/

</script>

@endsection
@section('script')
    <script type="text/javascript">
     $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('#mes').datepicker({format: 'yyyy-mm-dd',locale: 'es-es'});
        //DINERO EN BILLETES
        $('#collapse1').on('change','#mil','#quinientos',function(){

          var mil = parseInt($('#mil').val()*1000);
          var quinientos = parseInt($('#quinientos').val()*500);
          var doscientos = parseInt($('#dociento').val()*200);
          var cien = parseInt($('#cien').val()*100);
          var cincuenta = parseInt($('#cincuenta').val()*50);
          var veinte = parseInt($('#veinte').val()*20);

          console.log(quinientos);
          if(isNaN(mil)){
            mil=0;

          }
          if(isNaN(quinientos)){
            quinientos=0;

          }
          if(isNaN(doscientos)){
            doscientos=0;

          } if(isNaN(cien)){
            cien=0;

          } if(isNaN(cincuenta)){
            cincuenta=0;

          } if(isNaN(veinte)){
            veinte=0;

          }


          $('#total_efectivo').val(mil+quinientos);

  });




});

    
    
    </script>
@endsection