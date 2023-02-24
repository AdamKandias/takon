<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takon</title>

    <!-- LINK CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
</head>

<body>

    <div class="container-md g-0">
        <div class="d-flex">

            <!-- --LEFT-- -->
            <div class="left px-2">

                <div class="d-flex logo align-items-center justify-content-center">
                    <div class="imgLogo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="textLogo">
                        <a href="{{ route('home') }}" class="text-decoration-none fs-5">
                            Takon
                        </a>
                    </div>
                </div>


                <nav class="navList align-items-center d-flex">
                    <ul>

                        <li class="row g-0 align-items-center">
                            <a href="{{ route('home') }}" class="d-flex text-decoration-none text-reset">
                                <div class="iconNav">
                                    <img src="{{ asset('img/home.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                <div class="nameNav col">
                                    Home
                                </div>
                            </a>
                        </li>
                        <li class="row g-0 align-items-center">
                            <a href="{{ route('mapel') }}" class="d-flex text-decoration-none text-reset">
                                <div class="iconNav">
                                    <img src="{{ asset('img/note.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                <div class="nameNav col">
                                    Mata Pelajaran
                                </div>
                            </a>
                        </li>
                        <li class="row g-0 align-items-center">
                            <a href="notification.html" class="d-flex text-decoration-none text-reset">
                                <div class="iconNav">
                                    <img src="{{ asset('img/notification.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                <div class="nameNav col">
                                    Notification
                                </div>
                            </a>
                        </li>
                        <li class=" row g-0 align-items-center">
                            <a href="{{ route('profile') }}" class="d-flex text-decoration-none text-reset">
                                <div class="iconNav">
                                    <img src="{{ asset('img/userColor.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                <div class="nameNav col">
                                    Profile
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- --MID-- -->
            <div class="mid">
                <div class="topbar sticky-top d-flex">
                    <div class="void-box col-4"></div>
                    <div class="namePage col-4 d-flex justify-content-center align-items-center">
                        Profile
                    </div>
                </div>
                <div class="contents">
                    <div class="profileTop justify-content-center">
                        <div class="avatarContainer d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="" class="avatar">
                        </div>

                        <div class="infoContainer">
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <span class="nameProfile">{{ $user->name }}</span>
                            </div>
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <div class="role role-{{ $user->role->id }} px-4 py-2">
                                    {{ $user->role->role }}</div>
                                <div class="">{{ $user->point }} Poin</div>
                            </div>
                            <div class="d-flex infoAkun my-4 gap-4 justify-content-center">
                                <div><span class="fw-semibold">{{ $user->posts->count() }}</span> Pertanyaan
                                </div>
                                <div><span class="fw-semibold">{{ $user->answers->count() }}</span> Menjawab
                                </div>
                                <div><span class="fw-semibold">{{ $user->comments->count() }}</span> Komentar
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <div> Follower: {{ $user->followers()->count() }}</div>
                                <div> Following: {{ $user->follows()->count() }}</div>
                                @if ($followed)
                                    <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Unfollow</button>
                                    </form>
                                @else
                                <form action="{{ route('follow', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Follow</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="hrbottom"></div>
                    <div class="personInformation">
                        <p class="fs-4 fw-semibold text-center">Person Information</p>
                        <div class="d-flex justify-content-center data">
                            <ul>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <svg version="1.0" width="24" height="24"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.000000 512.000000"
                                            preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="#000000" stroke="none">
                                                <path
                                                    d="M2380 4945 c-252 -43 -500 -180 -660 -365 -391 -455 -369 -1111 50
                                            -1530 418 -418 1076 -440 1527 -52 140 120 268 315 326 493 169 518 -61 1086
                                            -541 1337 -220 115 -471 156 -702 117z m303 -316 c429 -66 730 -472 668 -899
                                            -84 -571 -719 -871 -1208 -570 -280 172 -430 506 -369 822 84 432 479 713 909
                                            647z" />
                                                <path
                                                    d="M1596 2389 c-480 -63 -897 -408 -1050 -869 -59 -180 -61 -201 -61
                                            -752 0 -496 0 -507 21 -534 11 -15 33 -37 48 -48 l27 -21 1979 0 1979 0 27 21
                                            c15 11 37 33 48 48 21 27 21 38 21 534 0 453 -2 516 -18 592 -111 519 -481
                                            892 -1007 1016 -69 16 -156 18 -1010 20 -514 1 -966 -2 -1004 -7z m1993 -337
                                            c287 -76 516 -268 642 -537 77 -164 82 -200 86 -642 l4 -393 -1761 0 -1761 0
                                            4 393 c3 364 5 398 25 476 101 384 421 668 817 724 17 2 442 4 945 3 913 -2
                                            915 -2 999 -24z" />
                                            </g>
                                        </svg>
                                        <span class="labeldata">Nama Lengkap : <span
                                                class="text-dark valueData">{{ $user->name }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 512.000000 512.000000"
                                            preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="#000000" stroke="none">
                                                <path
                                                    d="M610 4304 c-197 -52 -363 -210 -424 -404 l-26 -81 0 -1259 0 -1259 26 -81 c48 -153 166 -290 309 -360 130 -64 -5 -60 2065 -60 2070 0 1935 -4 2065 60 136 66 257 202 306 346 l24 69 0 1285 0 1285 -24 69 c-65 188 -232 341 -426 391 -87 22 -3810 22 -3895 -1z m3862 -342 c70 -34 105 -71 141 -150 l22 -47 0 -1205 0 -1205 -26 -55 c-33 -70 -79 -116 -149 -149 l-55 -26 -1845 0 -1845 0 -47 22 c-79 36 -116 71 -150 141 l-33 67 -3 1160 c-2 705 1 1184 7 1222 22 141 106 230 240 253 25 4 863 7 1861 6 l1815 -1 67 -33z" />
                                                <path
                                                    d="M872 3500 c-48 -30 -72 -75 -72 -140 0 -65 24 -110 72 -140 33 -20 54 -20 1688 -20 1634 0 1655 0 1688 20 48 30 72 75 72 140 0 65 -24 110 -72 140 -33 20 -54 20 -1688 20 -1634 0 -1655 0 -1688 -20z" />
                                                <path
                                                    d="M872 1740 c-48 -30 -72 -75 -72 -140 0 -65 24 -110 72 -140 31 -19 51 -20 408 -20 357 0 377 1 408 20 48 30 72 75 72 140 0 65 -24 110 -72 140 -31 19 -51 20 -408 20 -357 0 -377 -1 -408 -20z" />
                                            </g>
                                        </svg>
                                        <span class="labeldata">Kelas : <span
                                                class="text-dark valueData">{{ $user->class->class }}</span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="navBottom fixed-bottom bg-light">
                    <div>
                        <ul class="d-flex m-0">
                            <li>
                                <div class="iconNavBottom">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('img/home.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="{{ route('mapel') }}">
                                        <img src="{{ asset('img/note.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="notification.html">
                                        <img src="{{ asset('img/notification.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="{{ route('profile') }}">
                                        <img src="{{ asset('img/userColor.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
