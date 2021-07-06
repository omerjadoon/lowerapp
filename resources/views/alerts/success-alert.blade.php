@if(Session::has($ses))
<div class="alert alert-success alert-dismissible show" role="alert">
  <strong>Success!</strong> {{Session::get($ses)}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif