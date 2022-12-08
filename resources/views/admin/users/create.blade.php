@extends('template.main')

@section('content')
<h1 class="mt-4 text-center">Create New User</h1>

<form method="POST" action="{{ route('admin.users.store') }}">
    @include('admin.users.partial.form',['create' => true])
</form>
@endsection
