@extends('template.main')

@section('content')
@auth
<div class="alert alert-success mt-2" role="alert">
    <h1 class="mt-3">Welcome To The Activity Dashboard</h1>
</div>
@else
<div class="alert alert-warning mt-2" role="alert">
    <h1 class="mt-3">Log in to start activity</h1>
</div>
@endauth
@endsection
