@extends('layout.app')

@section('content')
    <h5 class="text-center  fs-3 fw-bold my-4">Register</h5>
    <div class="d-flex align-center justify-content-center mt-1">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="row w-50 mx-auto">
                <div class="mb-3 col-6 col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control border border-dark" style="background: transparent" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6 ">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control border border-dark" style="background: transparent" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control border border-dark" style="background: transparent" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control border border-dark" style="background: transparent" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control border border-dark" style="background: transparent" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column">
                    <x-button>Submit</x-button>
                    <a href="{{ route('login') }}">Already have an account?</a>
                </div>
            </div>
        </form>
    </div>
@endsection
