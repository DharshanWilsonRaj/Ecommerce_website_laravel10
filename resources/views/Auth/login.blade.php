@extends('layout.app')

@section('content')
    @if ($errors->has('email'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{ $errors->first('email') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h5 class="text-center my-4 fs-3 fw-bold">Login</h5>
    <div class="d-flex align-center justify-content-center mt-5 ">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" class="form-control border border-dark " name="email" value="{{ old('email') }}"
                    style="background: transparent">
                <div id="error" class="error"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control border border-dark " name="password"
                    value="{{ old('password') }}" style="background: transparent">
                <div id="error" class="error"></div>
            </div>
            <x-button class="w-100">Submit</x-button>
            <a href="{{route('register')}} ">Create new Account</a>
        </form>
    </div>
    </div>
@endsection
