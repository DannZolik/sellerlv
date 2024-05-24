<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Seller.lv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        html, body {
            height: 100%;
        }
    </style>
</head>
<body class="text-center d-flex justify-content-center align-items-center"> <!-- Добавление классов d-flex и justify-content-center -->
<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <img class="mb-4" src="/logo.png" alt="" width="65%">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input id="email" type="email" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
            <label for="email">Email address</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating">
            <input id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            <label for="password">Password</label>
        </div>


        <div class="checkbox mb-3 mt-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember" id="remember"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        <div class="text-center mt-3">
            <p>Not a member? <a href="{{ route('signup') }}">Register</a></p>
        </div>


    </form>
</main>
@include('footer')
</body>
</html>
