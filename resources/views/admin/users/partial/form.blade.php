@csrf
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="@isset($user) {{ $user->name}} @endisset" id="name" aria-describedby="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-12"></div>

            <div class="col-6">
                <label for="name" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="@isset($user) {{ $user->email}} @endisset" id="email" aria-describedby="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-12"></div>

            @isset($edit)
            <div class="col-6 mt-3">
                <h6 class="alert bg-info text-light">Leave field blank too keep old password</h6>
            </div>
            @endisset
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
            <div class="col-6 mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
