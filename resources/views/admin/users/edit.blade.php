@extends('template.main')

@section('content')
<h1 class="mt-4 text-center">Modify User Details</h1>

<form method="POST" action="{{ route('admin.users.update',$user->id) }}">
    @method('PATCH')
    @include('admin.users.partial.form',['edit' => true])
</form>
@endsection
