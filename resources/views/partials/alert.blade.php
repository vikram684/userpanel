@if(session('success'))
<div class="alert alert-success mt-2" role="alert">
    {{ session('success')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger mt-2" role="alert">
    {{ session('error')}}
  </div>
@endif
