<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller.lv | Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            /*padding: 15px;*/
            /*margin: auto;*/
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            height: auto;
            /*margin-bottom: 10px;*/
        }
        .form-signin input[type="email"]:focus,
        .form-signin input[type="password"]:focus {
            z-index: 2;
        }
    </style>
</head>
<body class="text-center">

<main class="form-signin">
    <form method="POST" action="{{ route('signup') }}">
        @csrf

        <img class="mb-4" src="/logo.png" alt="" width="100%">
        <h1 class="h3 mb-3 fw-normal">Create an account</h1>

        <div class="form-floating">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
            <label for="name">Your Name</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input id="email" type="email" class="form-control mt-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback mb-1">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input id="password_confirmation" type="password" class="form-control mt-1 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            <label for="password_confirmation">Confirm Password</label>
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign up</button>

        <div class="mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
    </form>
</main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
