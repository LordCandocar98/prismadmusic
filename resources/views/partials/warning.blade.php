@if(session('warning'))
  <div class="alert alert-warning alert-dismissible" role="alert">
    {!! session('warning') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif