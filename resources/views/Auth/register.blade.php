<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <h5 class="text-center my-4">Register</h5>
    <div class="d-flex align-center justify-content-center mt-1">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                @error('password')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                @error('address')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('login') }}">Already have an account?</a>
            </div>
        </form>
    </div>


    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
