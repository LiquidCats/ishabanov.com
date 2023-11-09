@extends('themes.default.layouts.default')

@section("content")
<div class="container mt-5">

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i data-feather="alert-triangle" class="flex-shrink-0 me-2"></i>
        <div>{{ $error }}</div>
    </div>
@endforeach
@endif

    <form method="POST" action="{{ route('auth.sign-in') }}">
        @csrf
        <div class="form-floating mb-3">
          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </div>
    </form>
</div>
@stop
