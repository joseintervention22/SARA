<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-flag-o"></i>
        <span class="label label-danger">{{$errorcont}}</span>
        </a>
        <ul class="dropdown-menu">
                @if ($errorcont === 0)
                <li class="header">Sin detalles o errores</li>                    
                @else
                <li class="header">Tienes {{$errorcont}} reembolsos con detalle</li>
                @endif

          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <!-- Task item -->
              @foreach ($rechazos as $rejected)
                <li>
                <a href="{{route('reembolso.detail',$rejected->id)}}">
                  
                  @if($rejected->estado ==9)
                  <h3>
                    Reembolso No. {{$rejected->consecutivo}} No aprovado por finanzas
                    <small class="pull-right">ver</small>
                  </h3>
                  @elseif($rejected->estado ==10)
                  <h3>
                    Reembolso No. {{$rejected->consecutivo}}Rechaza pago programado
                    <small class="pull-right">ver</small>
                  </h3>
                  @endif
                  
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: 100%" role="progressbar"
                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">20% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              @endforeach
              <!-- end task item -->

            </ul>
          </li>
          <li class="footer">
          <a href="{{route('reembolso.all')}}">Ver todo</a>
          </li>
        </ul>
      </li>