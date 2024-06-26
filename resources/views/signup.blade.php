@include('header', ['pageTitle' => 'Sign up'])

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


<body class="text-center px-3 px-sm-0">

<main class="form-signin">
    <form method="POST" action="{{ route('signup') }}">
        @csrf

        <a href="{{route('home')}}"><img class="mb-4" src="/logo.png" alt="" width="65%"></a>
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

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" style="background-color: #34c3a0; border-color:#34c3a0">Sign up</button>

        <div class="mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
    </form>
</main>

</body>
@include('footer')
</html>
