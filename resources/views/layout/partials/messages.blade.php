@if(Session::has('success'))
    <!-- Success Alert Content -->
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-check-circle"></i> {{Session::get('success')}}</h5>
    </div>
    <!-- END Success Alert Content -->
@elseif(Session::has('info'))
    <br>
    <!-- Info Alert Content -->
    <div class="alert alert-info alert-dismissable" style="margin-bottom: -16px;
    margin-top: 12px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-info-circle"></i> {{Session::get('mensaje_info')}}</h4>
        Más <a href="javascript:void(0)" class="alert-link">Detalles</a>!
    </div>
    <!-- END Info Alert Content -->
@elseif(Session::has('warning'))
    <!-- Warning Alert Content -->
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-exclamation-circle"></i> {{Session::get('warning')}}</h5>
    </div>
    <!-- END Warning Alert Content -->
@elseif(Session::has('danger'))
    <!-- Danger Alert Content -->
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="fa fa-check-circle"></i> {{Session::get('danger')}}</h5>
    </div>
    <!-- END Danger Alert Content -->
@elseif($errors->any())
    <!-- Danger Alert Content -->
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    <!-- END Danger Alert Content -->

@endif