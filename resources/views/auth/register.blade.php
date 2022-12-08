@extends('template.main')

@section('content')
<h1 class="mt-4 text-center">Register</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}" id="name" aria-describedby="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-12"></div>

            <div class="col-6">
                <label for="name" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}" id="email" aria-describedby="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-12"></div>

            <div class="col-6">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-12"></div>

            <div class="col-6">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
            <div class="col-12"></div>

            <div class="col-6 mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection
