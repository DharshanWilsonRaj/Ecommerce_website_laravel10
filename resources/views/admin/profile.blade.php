@extends('admin.layout.app')

@section('content')
    <p class="fs-3 text-center mt-4 fw-bold">Profile</p>
    <div class="d-flex align-items-center justify-content-center">
        <form method="post" action="{{ route('admin.profile.update') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                @error('name')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                @error('email')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column">
                <x-button> Update</x-button>
            </div>
        </form>
    </div>
@endsection
