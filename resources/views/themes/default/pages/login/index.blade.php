@extends('themes.default.layouts.login')

@section('title', 'Sign IN')

@section('content')
    <div class="container-fluid" style="max-width: 480px">
        <div class="row min-vh-100 align-items-center">
            <div class="col">
                <form method="POST" action="{{ route('auth.sign-in') }}" class="bg-dark p-4 rounded-4">
                    @csrf
                    <fieldset>
                        <legend class="text-white text-center">Sign In</legend>
                        <div class="form-floating mb-3">
                           <input name="email"
                                  type="email"
                                  class="form-control"
                                  id="floatingInput"
                                  placeholder="name@example.com"
                                  value="{{ old('email') }}">
                           <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input name="password"
                                   type="password"
                                   class="form-control"
                                   id="floatingPassword"
                                   placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                        <div class="mt-3 text-center">
                            <a href="{{ route('pages.home') }}" class="text-white"><i class="bi bi-arrow-left"></i> to Homepage</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
