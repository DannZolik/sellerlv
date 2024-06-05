@include('header', ['pageTitle' => 'Sign in'])

<body class="text-center d-flex justify-content-center align-items-center px-3 px-sm-0"> <!-- Добавление классов d-flex и justify-content-center -->

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

<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <a href="{{route('home')}}"><img class="mb-4" src="/logo.png" alt="" width="65%"></a>
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
                <input type="checkbox" name="remember" id="remember" value="1"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" style="background-color: #34c3a0; border-color:#34c3a0">Sign in</button>

        <div class="text-center mt-3">
            <p>Not a member? <a href="{{ route('signup') }}">Register</a></p>
        </div>


    </form>
</main>
@include('footer')
</body>
</html>
