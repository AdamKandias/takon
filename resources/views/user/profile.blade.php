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
                            <a href="{{ route('home') }}" class="d-flex text-decoration-none text-dark">
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
                            <a href="{{ route('mapel') }}" class="d-flex text-decoration-none text-dark">
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
                            <a href="notification.html" class="d-flex text-decoration-none text-dark">
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
                            <a href="{{ route('profile') }}" class="d-flex text-decoration-none text-dark">
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
                    <div class="box-logout col-4 d-flex justify-content-end align-items-center">
                        <form action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf
                            <button class="mybtn-logout rounded-pill me-2" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                <div class="contents">
                    @if (Session::has('status'))
                        <div class="alert alert-success text-center mb-0" role="alert">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    @if ($errors->editImage->first())
                        <div class="alert alert-danger text-center mb-0" role="alert">
                            Gambar yang diinputkan tidak valid!
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger text-center mb-0" role="alert">
                            Password yang diisikan tidak valid!
                        </div>
                    @endif
                    @if (Session::has('passwordStatus'))
                        <div class="alert alert-danger text-center mb-0" role="alert">
                            {{ Session::get('passwordStatus') }}
                        </div>
                    @endif
                    <div class="profileTop justify-content-center">
                        <div class="avatarContainer d-flex justify-content-center">
                            <a href="#imageModalToggle" data-bs-toggle="modal">
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="avatar">
                            </a>
                        </div>
                        <div class="modal fade" id="imageModalToggle" aria-hidden="true"
                            aria-labelledby="imageModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-dark" id="imageModalToggleLabel">Foto Profil
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning" data-bs-target="#editModalToggle"
                                            data-bs-toggle="modal">Ubah Gambar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModalToggle" aria-hidden="true"
                            aria-labelledby="editModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-dark" id="editModalToggleLabel">Edit Gambar
                                            Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('editImage') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            @if ($errors->editImage->first())
                                                <div class="alert alert-danger text-center">
                                                    <ul class="py-0 my-0">
                                                        <li>{{ $errors->editImage->first('image') }}</li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <img id="output" class="img-fluid mb-4" style="display: none" />
                                            <input type="file" name="image" class="form-control"
                                                onchange="loadFile(event)">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-target="#imageModalToggle"
                                                data-bs-toggle="modal">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Ganti Gambar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="infoContainer">
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <span class="nameProfile">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <div class="role role-{{ Auth::user()->role->id }} px-4 py-2">
                                    {{ Auth::user()->role->role }}</div>
                                <div class="">{{ Auth::user()->point }} Poin</div>
                            </div>
                            <div class="d-flex infoAkun my-4 gap-4 justify-content-center">
                                <a class="text-decoration-none text-primary" href="{{ route('userPost') }}">
                                    <div><span class="fw-semibold">{{ Auth::user()->posts->count() }}</span>
                                        Pertanyaan
                                    </div>
                                </a>
                                <a class="text-decoration-none text-primary" href="{{ route('userAnswer') }}">
                                    <div><span class="fw-semibold">{{ Auth::user()->answers->count() }}</span>
                                        Menjawab
                                    </div>
                                </a>
                                <a class="text-decoration-none text-primary" href="{{ route('userComment') }}">
                                    <div><span class="fw-semibold">{{ Auth::user()->comments->count() }}</span>
                                        Komentar
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <a class="text-decoration-none text-reset" href="{{ route('follower') }}">
                                    <div> Follower: {{ Auth()->user()->followers()->count() }}</div>
                                </a>
                                <a class="text-decoration-none text-reset" href="{{ route('following') }}">
                                    <div> Following: {{ Auth()->user()->follows()->count() }}</div>
                                </a>
                                <a class="text-decoration-none text-reset" href="{{ route('likes') }}">
                                    <div> Disukai: {{ Auth()->user()->likesCount() }}</div>
                                </a>
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
                                                class="text-dark valueData">{{ Auth::user()->name }}</span></span>
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
                                        <span class="labeldata">NISN : <span
                                                class="text-dark valueData">{{ Auth::user()->nisn }}</span></span>
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
                                                    d="M1269 5057 c-41 -28 -134 -175 -239 -382 -119 -234 -153 -358 -131
                                                -480 25 -136 124 -270 244 -328 56 -27 57 -28 57 -71 l0 -43 -51 -7 c-102 -14
                                                -188 -77 -231 -171 -23 -50 -23 -52 -26 -552 l-3 -503 -135 0 c-110 0 -146 -4
                                                -196 -21 -110 -37 -198 -114 -245 -214 l-28 -60 0 -280 0 -280 26 -55 c14 -30
                                                40 -68 57 -85 l31 -30 1 -572 0 -573 -137 0 c-159 0 -208 -15 -243 -72 -30
                                                -48 -24 -146 10 -184 55 -58 -133 -54 2530 -54 2663 0 2475 -4 2530 54 34 38
                                                40 136 10 184 -35 57 -84 72 -242 72 l-138 0 0 573 1 572 29 29 c17 16 43 55
                                                58 85 l27 56 0 280 0 280 -28 60 c-47 100 -135 177 -245 214 -50 17 -86 21
                                                -196 21 l-135 0 -3 503 -3 502 -24 52 c-41 93 -127 155 -232 169 l-49 7 0 42
                                                c0 42 1 43 57 71 121 61 219 193 244 329 22 122 -12 246 -131 480 -105 207
                                                -198 354 -239 382 -23 16 -49 23 -80 23 -79 0 -107 -23 -188 -157 -99 -166
                                                -206 -381 -243 -490 -48 -144 -37 -275 33 -392 40 -66 135 -154 193 -178 43
                                                -18 44 -19 44 -64 l0 -46 -46 -7 c-98 -13 -186 -77 -228 -166 -20 -44 -21 -60
                                                -24 -552 l-3 -508 -144 0 -144 0 -3 508 -3 507 -24 48 c-46 92 -159 167 -253
                                                167 -26 0 -28 2 -28 44 0 43 1 44 58 72 169 82 276 289 244 473 -20 118 -111
                                                319 -253 561 -90 153 -120 180 -199 180 -46 0 -85 -17 -116 -52 -61 -66 -270
                                                -465 -313 -593 -44 -135 -38 -252 21 -369 38 -76 127 -164 201 -200 56 -28 57
                                                -29 57 -72 0 -42 -2 -44 -28 -44 -94 0 -207 -75 -253 -167 l-24 -48 -3 -507
                                                -3 -508 -144 0 -144 0 -3 508 c-3 492 -4 508 -24 552 -42 89 -130 153 -228
                                                166 l-46 7 0 46 c0 45 1 46 46 65 59 24 150 109 191 177 70 117 81 248 32 393
                                                -37 110 -140 320 -241 486 -82 137 -109 160 -189 160 -31 0 -57 -7 -80 -23z
                                                m144 -559 c75 -155 91 -201 84 -244 -12 -73 -71 -124 -142 -124 -59 0 -106 29
                                                -134 83 -21 43 -22 51 -11 94 13 53 129 303 140 303 4 0 32 -51 63 -112z
                                                m1215 -15 c82 -172 91 -209 67 -263 -54 -120 -216 -120 -270 0 -16 37 -17 47
                                                -6 88 13 52 130 302 141 302 4 0 34 -57 68 -127z m1210 -1 c33 -70 66 -149 72
                                                -175 11 -43 10 -51 -11 -94 -68 -131 -257 -101 -276 44 -3 25 2 56 17 93 31
                                                80 122 260 130 260 4 0 34 -57 68 -128z m-2338 -1502 l0 -460 -150 0 -150 0 0
                                                460 0 460 150 0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150
                                                0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150 0 150 0 0
                                                -460z m586 -803 c24 -28 24 -31 24 -232 0 -199 0 -204 -22 -219 -12 -9 -33
                                                -16 -46 -16 -13 0 -123 29 -244 65 -330 97 -347 100 -598 100 -247 0 -263 -3
                                                -573 -95 -241 -71 -344 -90 -487 -90 -143 0 -243 19 -499 94 -298 87 -320 91
                                                -566 91 -245 0 -266 -3 -591 -100 -121 -36 -230 -65 -244 -65 -14 0 -36 7 -48
                                                16 -21 15 -22 20 -22 217 0 217 4 237 54 257 11 5 867 8 1929 7 l1909 -2 24
                                                -28z m-2908 -608 c111 -10 186 -28 494 -118 171 -50 310 -71 468 -71 163 0
                                                301 22 489 77 382 112 483 129 668 113 124 -11 154 -18 398 -90 110 -32 221
                                                -64 248 -71 l47 -11 0 -524 0 -524 -1850 0 -1850 0 0 524 0 524 33 8 c17 3
                                                136 37 262 74 216 64 317 86 425 93 25 2 47 4 50 5 3 1 56 -3 118 -9z" />
                                            </g>
                                        </svg>

                                        <span class="labeldata">Kelas : <span
                                                class="text-dark valueData">{{ Auth::user()->class->class }}</span></span>
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
                                                    d="M1269 5057 c-41 -28 -134 -175 -239 -382 -119 -234 -153 -358 -131
                                                -480 25 -136 124 -270 244 -328 56 -27 57 -28 57 -71 l0 -43 -51 -7 c-102 -14
                                                -188 -77 -231 -171 -23 -50 -23 -52 -26 -552 l-3 -503 -135 0 c-110 0 -146 -4
                                                -196 -21 -110 -37 -198 -114 -245 -214 l-28 -60 0 -280 0 -280 26 -55 c14 -30
                                                40 -68 57 -85 l31 -30 1 -572 0 -573 -137 0 c-159 0 -208 -15 -243 -72 -30
                                                -48 -24 -146 10 -184 55 -58 -133 -54 2530 -54 2663 0 2475 -4 2530 54 34 38
                                                40 136 10 184 -35 57 -84 72 -242 72 l-138 0 0 573 1 572 29 29 c17 16 43 55
                                                58 85 l27 56 0 280 0 280 -28 60 c-47 100 -135 177 -245 214 -50 17 -86 21
                                                -196 21 l-135 0 -3 503 -3 502 -24 52 c-41 93 -127 155 -232 169 l-49 7 0 42
                                                c0 42 1 43 57 71 121 61 219 193 244 329 22 122 -12 246 -131 480 -105 207
                                                -198 354 -239 382 -23 16 -49 23 -80 23 -79 0 -107 -23 -188 -157 -99 -166
                                                -206 -381 -243 -490 -48 -144 -37 -275 33 -392 40 -66 135 -154 193 -178 43
                                                -18 44 -19 44 -64 l0 -46 -46 -7 c-98 -13 -186 -77 -228 -166 -20 -44 -21 -60
                                                -24 -552 l-3 -508 -144 0 -144 0 -3 508 -3 507 -24 48 c-46 92 -159 167 -253
                                                167 -26 0 -28 2 -28 44 0 43 1 44 58 72 169 82 276 289 244 473 -20 118 -111
                                                319 -253 561 -90 153 -120 180 -199 180 -46 0 -85 -17 -116 -52 -61 -66 -270
                                                -465 -313 -593 -44 -135 -38 -252 21 -369 38 -76 127 -164 201 -200 56 -28 57
                                                -29 57 -72 0 -42 -2 -44 -28 -44 -94 0 -207 -75 -253 -167 l-24 -48 -3 -507
                                                -3 -508 -144 0 -144 0 -3 508 c-3 492 -4 508 -24 552 -42 89 -130 153 -228
                                                166 l-46 7 0 46 c0 45 1 46 46 65 59 24 150 109 191 177 70 117 81 248 32 393
                                                -37 110 -140 320 -241 486 -82 137 -109 160 -189 160 -31 0 -57 -7 -80 -23z
                                                m144 -559 c75 -155 91 -201 84 -244 -12 -73 -71 -124 -142 -124 -59 0 -106 29
                                                -134 83 -21 43 -22 51 -11 94 13 53 129 303 140 303 4 0 32 -51 63 -112z
                                                m1215 -15 c82 -172 91 -209 67 -263 -54 -120 -216 -120 -270 0 -16 37 -17 47
                                                -6 88 13 52 130 302 141 302 4 0 34 -57 68 -127z m1210 -1 c33 -70 66 -149 72
                                                -175 11 -43 10 -51 -11 -94 -68 -131 -257 -101 -276 44 -3 25 2 56 17 93 31
                                                80 122 260 130 260 4 0 34 -57 68 -128z m-2338 -1502 l0 -460 -150 0 -150 0 0
                                                460 0 460 150 0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150
                                                0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150 0 150 0 0
                                                -460z m586 -803 c24 -28 24 -31 24 -232 0 -199 0 -204 -22 -219 -12 -9 -33
                                                -16 -46 -16 -13 0 -123 29 -244 65 -330 97 -347 100 -598 100 -247 0 -263 -3
                                                -573 -95 -241 -71 -344 -90 -487 -90 -143 0 -243 19 -499 94 -298 87 -320 91
                                                -566 91 -245 0 -266 -3 -591 -100 -121 -36 -230 -65 -244 -65 -14 0 -36 7 -48
                                                16 -21 15 -22 20 -22 217 0 217 4 237 54 257 11 5 867 8 1929 7 l1909 -2 24
                                                -28z m-2908 -608 c111 -10 186 -28 494 -118 171 -50 310 -71 468 -71 163 0
                                                301 22 489 77 382 112 483 129 668 113 124 -11 154 -18 398 -90 110 -32 221
                                                -64 248 -71 l47 -11 0 -524 0 -524 -1850 0 -1850 0 0 524 0 524 33 8 c17 3
                                                136 37 262 74 216 64 317 86 425 93 25 2 47 4 50 5 3 1 56 -3 118 -9z" />
                                            </g>
                                        </svg>

                                        <span class="labeldata">Tanggal Lahir : <span
                                                class="text-dark valueData">{{ implode('-', array_reverse(explode('-', Auth::user()->birthdate))) }}</span></span>
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
                                                    d="M1269 5057 c-41 -28 -134 -175 -239 -382 -119 -234 -153 -358 -131
                                                -480 25 -136 124 -270 244 -328 56 -27 57 -28 57 -71 l0 -43 -51 -7 c-102 -14
                                                -188 -77 -231 -171 -23 -50 -23 -52 -26 -552 l-3 -503 -135 0 c-110 0 -146 -4
                                                -196 -21 -110 -37 -198 -114 -245 -214 l-28 -60 0 -280 0 -280 26 -55 c14 -30
                                                40 -68 57 -85 l31 -30 1 -572 0 -573 -137 0 c-159 0 -208 -15 -243 -72 -30
                                                -48 -24 -146 10 -184 55 -58 -133 -54 2530 -54 2663 0 2475 -4 2530 54 34 38
                                                40 136 10 184 -35 57 -84 72 -242 72 l-138 0 0 573 1 572 29 29 c17 16 43 55
                                                58 85 l27 56 0 280 0 280 -28 60 c-47 100 -135 177 -245 214 -50 17 -86 21
                                                -196 21 l-135 0 -3 503 -3 502 -24 52 c-41 93 -127 155 -232 169 l-49 7 0 42
                                                c0 42 1 43 57 71 121 61 219 193 244 329 22 122 -12 246 -131 480 -105 207
                                                -198 354 -239 382 -23 16 -49 23 -80 23 -79 0 -107 -23 -188 -157 -99 -166
                                                -206 -381 -243 -490 -48 -144 -37 -275 33 -392 40 -66 135 -154 193 -178 43
                                                -18 44 -19 44 -64 l0 -46 -46 -7 c-98 -13 -186 -77 -228 -166 -20 -44 -21 -60
                                                -24 -552 l-3 -508 -144 0 -144 0 -3 508 -3 507 -24 48 c-46 92 -159 167 -253
                                                167 -26 0 -28 2 -28 44 0 43 1 44 58 72 169 82 276 289 244 473 -20 118 -111
                                                319 -253 561 -90 153 -120 180 -199 180 -46 0 -85 -17 -116 -52 -61 -66 -270
                                                -465 -313 -593 -44 -135 -38 -252 21 -369 38 -76 127 -164 201 -200 56 -28 57
                                                -29 57 -72 0 -42 -2 -44 -28 -44 -94 0 -207 -75 -253 -167 l-24 -48 -3 -507
                                                -3 -508 -144 0 -144 0 -3 508 c-3 492 -4 508 -24 552 -42 89 -130 153 -228
                                                166 l-46 7 0 46 c0 45 1 46 46 65 59 24 150 109 191 177 70 117 81 248 32 393
                                                -37 110 -140 320 -241 486 -82 137 -109 160 -189 160 -31 0 -57 -7 -80 -23z
                                                m144 -559 c75 -155 91 -201 84 -244 -12 -73 -71 -124 -142 -124 -59 0 -106 29
                                                -134 83 -21 43 -22 51 -11 94 13 53 129 303 140 303 4 0 32 -51 63 -112z
                                                m1215 -15 c82 -172 91 -209 67 -263 -54 -120 -216 -120 -270 0 -16 37 -17 47
                                                -6 88 13 52 130 302 141 302 4 0 34 -57 68 -127z m1210 -1 c33 -70 66 -149 72
                                                -175 11 -43 10 -51 -11 -94 -68 -131 -257 -101 -276 44 -3 25 2 56 17 93 31
                                                80 122 260 130 260 4 0 34 -57 68 -128z m-2338 -1502 l0 -460 -150 0 -150 0 0
                                                460 0 460 150 0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150
                                                0 150 0 0 -460z m1210 0 l0 -460 -150 0 -150 0 0 460 0 460 150 0 150 0 0
                                                -460z m586 -803 c24 -28 24 -31 24 -232 0 -199 0 -204 -22 -219 -12 -9 -33
                                                -16 -46 -16 -13 0 -123 29 -244 65 -330 97 -347 100 -598 100 -247 0 -263 -3
                                                -573 -95 -241 -71 -344 -90 -487 -90 -143 0 -243 19 -499 94 -298 87 -320 91
                                                -566 91 -245 0 -266 -3 -591 -100 -121 -36 -230 -65 -244 -65 -14 0 -36 7 -48
                                                16 -21 15 -22 20 -22 217 0 217 4 237 54 257 11 5 867 8 1929 7 l1909 -2 24
                                                -28z m-2908 -608 c111 -10 186 -28 494 -118 171 -50 310 -71 468 -71 163 0
                                                301 22 489 77 382 112 483 129 668 113 124 -11 154 -18 398 -90 110 -32 221
                                                -64 248 -71 l47 -11 0 -524 0 -524 -1850 0 -1850 0 0 524 0 524 33 8 c17 3
                                                136 37 262 74 216 64 317 86 425 93 25 2 47 4 50 5 3 1 56 -3 118 -9z" />
                                            </g>
                                        </svg>
                                        <span class="labeldata">Password : <span
                                                class="@if (Auth::user()->password) text-success @else text-danger @endif valueData">
                                                @if (Auth::user()->password)
                                                    Password sudah ada,
                                                    <a class="text-decoration-none text-secondary" href=""
                                                        data-bs-toggle="modal" data-bs-target="#edit-pass"><mark
                                                            class="text-primary py-2 px-2 rounded">edit password?
                                                        </mark></a>
                                                    <div class="modal fade" id="edit-pass" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content rounded-1 shadow">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark fw-semibold">EDIT
                                                                        PASSWORD
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('editPassword') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body py-0">
                                                                        @if ($errors->any())
                                                                            <div
                                                                                class="alert alert-danger text-center">
                                                                                <ul class="py-0 my-0">
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                        <div class="inputGroup">
                                                                            <input name="password" type="password"
                                                                                required="" autocomplete="off">
                                                                            <label for="name">Password
                                                                                Sekarang</label>
                                                                        </div>
                                                                        <div class="inputGroup">
                                                                            <input name="new_password" type="password"
                                                                                required="" autocomplete="off">
                                                                            <label for="name">Password Baru</label>
                                                                        </div>
                                                                        <div class="inputGroup">
                                                                            <input name="password_confirm"
                                                                                type="password" required=""
                                                                                autocomplete="off">
                                                                            <label for="name">Konfirmasi
                                                                                Password</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-pass px-3">Ubah
                                                                            Password</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    Password tidak ada, <a class="text-decoration-none" href=""
                                                        data-bs-toggle="modal" data-bs-target="#create-pass"><mark
                                                            class="text-primary py-2 px-2 rounded">buat password!
                                                        </mark></a>
                                                    <div class="modal fade" id="create-pass"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content rounded-1 shadow">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title fw-semibold text-dark">
                                                                        BUAT
                                                                        PASSWORD
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('createPassword') }}"
                                                                    method="POST">
                                                                    <div class="modal-body py-0">
                                                                        @if ($errors->any())
                                                                            <div
                                                                                class="alert alert-danger text-center">
                                                                                <ul class="py-0 my-0">
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                        @csrf
                                                                        <div class="inputGroup">
                                                                            <input name="password" type="password"
                                                                                required="" autocomplete="off">
                                                                            <label for="name">Password</label>
                                                                        </div>
                                                                        <div class="inputGroup">
                                                                            <input name="password_confirm"
                                                                                type="password" required=""
                                                                                autocomplete="off">
                                                                            <label for="name">Konfirmasi
                                                                                Password</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-pass px-3">Buat
                                                                            Sekarang</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                @endif
                                            </span></span>
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
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.style.display = "block";
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
</body>

</html>
