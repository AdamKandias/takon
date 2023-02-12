<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- LINK CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/login.css') }}">
</head>

<body>
    <div class="display d-flex">
        <div class="bg-display-1 col g-0">
            <div class="bg-black">
                <div class="d-flex">
                    <div class="left-logo d-flex align-items-center ps-5">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" height="60" width="60">
                    </div>
                </div>
                <div class="cnt-mid d-flex justify-content-center align-items-center">
                    <div class="my-text text-center">
                        <p class="welcome">Welcome!</p>
                        <span class="artikel">An social media applications, platform, and forums where users can interact with each other by asking and answering questions. Sign in now to start the journey together!</span>
                        <div class="my-5 scrollSpy">
                            <a href="#inputNISN" class="btn-go-login d-block-md">
                                <svg width="30" height="30" fill="#000" viewBox="0 0 48 48"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h48v48H0z" fill="none" />
                                    <g id="Shopicon">
                                        <g>
                                            <polygon
                                                points="24,29.171 9.414,14.585 6.586,17.413 24,34.827 41.414,17.413 38.586,14.585" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-display-2 col d-flex align-items-center justify-content-center g-0">
            <div class="ggg">
                <form action="{{ route('auth') }}" method="POST">
                    @csrf
                    <p class="text-header-login text-center fs-2">Sign in to Takon</p>
                    @if (Session::has('status'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="py-0 my-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="forms d-grid gap-3 my-4">
                        <input type="text" name="nisn" class="myinput px-3 form-control" id="inputNISN"
                            placeholder="NISN" value="{{ old('nisn') }}" required>
                        <input type="text" name="birthdate" class="myinput form-control px-3" id="inputBirthDate"
                            placeholder="Birth Date (ex : 18-03-2005)" value="{{ old('birthdate') }}">
                        <input type="password" name="password" class="myinput form-control px-3" id="inputPassword"
                            placeholder="Password">
                        <button class="mybtn btn-pm mt-3" type="submit">Sign In</button>

                        <a href="#">
                            <button class="mybtn btn-sc" type="button">Forgot Password</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
