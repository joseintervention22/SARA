@extends('layouts.plantilla')
@section('content')



<div class="col-md-12">
<div class="box  box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Informacion</h3>
    </div>

    <div class="box-body">
        <table id="example" class="table table-hover">

                <thead>
                        <tr>        
                            <th>Reembolso Consecutivo</th>
                            <th>Concepto</th>
                            <th>Proveedor</th>
                            <th>importe</th>
                            <th>Creacion</th>
                            <th>ver</th>
                        </tr>
                    </thead>
                    

        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" id="computer_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto de la pc</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="form_output"></span>
                                <div class="form-group">
                                    <label>CONSECUTIVO</label>
                                    <input type="text" name="marca" id="marca" class="form-control" readonly />
                                </div>
                                <div class="form-group">
                                    <label>IMPORTE</label>
                                    <input type="text" name="modelo" id="modelo" class="form-control" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>CONCEPTO</label>
                                    <input type="text" name="so" id="so" class="form-control" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>MOVIMIENTOS</label>
                                    <textarea style="height: 300px;" name="cpu" id="cpu" class="form-control" readonly>
                                    </textarea>
                                </div>
                                
                                

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="button_action" id="button_action" value="insert" />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




    </div>

</div>
@endsection
@section('script')
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
      'serverSide'  : true,
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      
      },
      'ajax'        : "{{url('/reembolsos/registro/asinc')}}",
      'columns'     : [
          {data: 'consecutivo'},
          {data: 'concepto'},
          {data: 'proveedor'},
          {data: 'importe'},
          {data: 'created_at'},
          {data: 'action'}


      ],
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
    $(document).on('click', '.edit', function(){
                            var id = $(this).attr("id");
                            $.ajax({
                            url:"{{route('ajaxdata.fetchdata')}}",
                                    method: 'get',
                                    data: {id, id},
                                    dataType: 'json',
                                    success:function(data){
                                            $('#marca').val(data.consecutivo);
                                            $('#so').val(data.concepto);
                                            $('#modelo').val(data.importe);
                                            $('#cpu').val(data.registro);
                                            $('#ram').val(data.ram);
                                            $('#monitor').val(data.monitor);
                                            $('#computer_id').val(id);
                                            $('#exampleModal').modal('show');
                                            $('#action').val('Edit');
                                            $('.modal-title').text('REGISTRO DE MOVIMIENTOS');
                                    }
                            })
                    });
    
    });
    
    </script>
@endsection