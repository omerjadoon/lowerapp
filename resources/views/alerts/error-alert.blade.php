@if(Session::has($ses_name))
<!-- fade class remove -->
<div class="alert alert-danger alert-dismissible show" role="alert">
  <strong>Error!</strong> {{Session::get($ses_name)}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif