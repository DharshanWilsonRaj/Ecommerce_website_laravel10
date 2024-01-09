@extends('layout.app')

@section('content')
    <h5 class="text-center  fs-3 fw-bold my-2">Profile</h5>
    <div class="d-flex mt-1 w-75 mx-auto">
        <form method="post" action="{{ route('profile') }}" class="d-flex gap-3" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-start p-2  justify-content-center ">
                <div style="position: relative">
                    <img src="{{ $user->image ? $user->image : 'https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-PNG-Photos.png' }}"
                        class="rounded-circle bg-secondary border border-light" alt="" style="width:150px; height:150px;"
                        id="profile_img" />
                    <label for="fileInput" class="bg-warning p-2 px-3 border border-light rounded-circle text-white fs-5"
                        style="position: absolute; bottom:0; right:0; cursor: pointer">+
                    </label>
                    <input type="file" name="image" value="{{ $user->image }}" id="fileInput" style="display: none"
                        onchange="updateImage(this)">

                </div>
            </div>
            <div class="row w-75">
                <div class="mb-3 col-12 col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control border border-dark" style="background: transparent"
                        name="name" value="{{ $user->name }}">
                    @error('name')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control border border-dark" style="background: transparent"
                        name="email"value="{{ $user->email }}">
                    @error('email')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" id="" cols="30" rows="1" class="form-control border border-dark"
                        style="background: transparent">{{ old('address', $user->address) }}</textarea>
                    @error('address')
                        <div id="error" class="error text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control border border-dark" style="background: transparent"
                        name="phone"value="{{ $user->phone }}">
                    @error('phone')
                        <div id="error" class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column">
                    <x-button>Update</x-button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateImage(input) {
            if (input.files && input.files[0]) {
                let url = URL.createObjectURL(input.files[0]);
                let image = document.getElementById('profile_img');
                image.src = url;
            }
        }
    </script>
@endsection
