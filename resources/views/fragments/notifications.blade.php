<li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
        <span class="label label-success">{{$conteo}}</span>
        </a>
    
    
        <ul class="dropdown-menu">
        <li class="header"> rembolsos en bandeja ({{$conteo}})</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              @foreach ($inbox as $item)
                  
              <li><!-- start message -->
              <a href="{{route('reembolso.get',$item->id)}}">
                  <div class="pull-left">
                  <img src="{{asset("images/refound.jpg")}}" class="img-circle" alt="User Image">
                  </div>
                  <h4>
                     Reembolso consecutivo {{$item->consecutivo}}       
                    
                    <small><i class="fa fa-clock-o"></i> </small>
                  </h4>
                <p>{{$item->concepto}} {{$item->proveedor}}</p>
                </a>
              </li>
              @endforeach
    
              <!-- end message -->
              
    
            </ul>
          </li>
        <li class="footer"><a href="{{route('reembolso.all')}}">Ver todos los Reembolsos</a></li>
        </ul>
    
      </li>          
      