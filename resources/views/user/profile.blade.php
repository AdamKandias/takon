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
                        <a href="home.html">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="textLogo">
                        <a href="home.html" class="text-decoration-none fs-5">
                            Takon
                        </a>
                    </div>
                </div>


                <nav class="navList align-items-center d-flex">
                    <ul>

                        <li class="row g-0 align-items-center">
                            <a href="home.html" class="d-flex text-decoration-none text-dark">
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
                            <a href="mapel.html" class="d-flex text-decoration-none text-dark">
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
                            <a href="profile.html" class="d-flex text-decoration-none text-dark">
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
                <div class="topbar sticky-top d-flex justify-content-center align-items-center">
                    <div class="namePage">
                        Profile
                    </div>
                </div>
                <div class="contents">
                    <div class="profileTop justify-content-center">
                        <div class="avatarContainer d-flex justify-content-center">
                            <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar">
                        </div>
                        <div class="infoContainer">
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <span class="nameProfile">Ibnu Wazowski</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#323C45"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <a class="editProfile my-2 d-none" href="#">Edit Profile</a>
                            </div>
                            <div class="d-flex infoAkun my-4 gap-4 justify-content-center">
                                <div><span class="fw-semibold">0</span> Pertanyaan</div>
                                <div><span class="fw-semibold">0</span> Menjawab</div>
                            </div>
                            <div class="role py-2 col-4 text-center mx-auto">role name</div>
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
                                        <span class="labeldata">Nama Lengkap : <span class="text-dark valueData">Mike
                                                Wazowski</span></span>
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
                                                class="text-dark valueData">0057679809</span></span>
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

                                        <span class="labeldata">Birth Day : <span class="text-dark valueData">08
                                                November 1999</span></span>
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
                                                    d="M1152 5099 c-25 -12 -55 -39 -70 -62 -25 -38 -27 -48 -30 -178 l-3
                                            -137 -207 -4 c-191 -4 -213 -7 -287 -31 -131 -44 -219 -99 -321 -201 -101
                                            -101 -156 -189 -202 -321 l-27 -80 0 -1725 0 -1725 27 -80 c46 -132 101 -220
                                            202 -321 101 -101 189 -156 321 -202 l80 -27 874 -3 873 -3 45 22 c27 13 55
                                            37 71 62 23 35 27 51 27 117 0 66 -4 82 -27 117 -16 24 -44 49 -70 62 -44 21
                                            -50 21 -824 21 -465 0 -807 4 -849 10 -182 26 -319 163 -345 345 -13 95 -13
                                            3115 0 3210 13 91 51 168 114 231 95 94 193 123 414 124 l112 0 0 -127 c0
                                            -150 16 -197 83 -241 35 -23 51 -27 117 -27 66 0 82 4 117 27 67 44 83 91 83
                                            241 l0 127 450 0 450 0 0 -127 c0 -150 16 -197 83 -241 35 -23 51 -27 117 -27
                                            66 0 82 4 117 27 67 44 83 91 83 241 l0 127 455 0 455 0 0 -127 c0 -150 16
                                            -197 83 -241 35 -23 51 -27 117 -27 66 0 82 4 117 27 67 44 83 91 83 241 l0
                                            127 118 0 c225 -1 323 -30 418 -124 63 -63 101 -140 114 -231 5 -40 10 -319
                                            10 -654 0 -575 0 -585 21 -629 13 -26 38 -54 62 -70 35 -23 51 -27 117 -27 66
                                            0 82 4 117 27 25 16 49 44 62 71 22 45 22 46 19 723 l-3 679 -27 80 c-46 132
                                            -101 220 -202 321 -102 102 -190 157 -321 201 -74 25 -95 27 -292 31 l-213 4
                                            0 126 c0 149 -16 196 -83 240 -35 23 -51 27 -117 27 -66 0 -82 -4 -117 -27
                                            -67 -44 -83 -91 -83 -241 l0 -127 -455 0 -455 0 0 127 c0 150 -16 197 -83 241
                                            -35 23 -51 27 -117 27 -66 0 -82 -4 -117 -27 -67 -44 -83 -91 -83 -241 l0
                                            -127 -450 0 -450 0 0 127 c0 150 -16 197 -83 241 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M1152 3199 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M2022 3199 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M2892 3199 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M3762 3199 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M3687 2405 c-245 -46 -474 -171 -649 -354 -148 -153 -249 -332 -306
                                            -541 -24 -88 -26 -111 -26 -300 0 -189 2 -212 26 -300 60 -220 161 -395 322
                                            -556 161 -161 336 -262 556 -322 88 -24 111 -26 300 -26 189 0 212 2 300 26
                                            220 60 395 161 556 322 161 161 262 336 322 556 24 88 26 111 26 300 0 189 -2
                                            212 -26 300 -60 220 -161 395 -322 556 -162 161 -339 264 -556 321 -80 21
                                            -122 26 -270 29 -125 2 -197 -1 -253 -11z m395 -411 c252 -58 466 -235 566
                                            -470 84 -199 84 -429 0 -628 -100 -235 -314 -412 -566 -470 -92 -21 -252 -21
                                            -344 0 -305 69 -543 307 -612 612 -21 92 -21 252 0 344 69 301 297 533 599
                                            609 92 23 262 24 357 3z" />
                                                <path
                                                    d="M3812 1799 c-25 -12 -55 -39 -70 -62 l-27 -40 -3 -270 c-3 -258 -2
                                            -270 19 -314 13 -27 37 -55 62 -71 40 -27 42 -27 249 -30 198 -3 212 -2 254
                                            19 28 13 56 37 72 62 23 35 27 51 27 117 0 66 -4 82 -27 117 -38 57 -95 83
                                            -186 83 l-72 0 0 132 c0 156 -15 201 -83 246 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M1152 2329 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M2022 2329 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M1152 1459 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                                <path
                                                    d="M2022 1459 c-62 -31 -95 -86 -100 -165 -8 -124 61 -204 184 -212 124
                                            -8 204 61 212 184 5 81 -22 143 -81 182 -56 37 -154 42 -215 11z" />
                                            </g>
                                        </svg>
                                        <span class="labeldata">Bergabung pada : <span class="text-dark valueData">16
                                                November 2022</span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center py-5">

                            <button type="button" class="btn btn-danger mybtn-logout px-4">LOG OUT</button>
                        </div>
                    </div>
                </div>
                <nav class="navBottom fixed-bottom bg-light">
                    <div>
                        <ul class="d-flex m-0">
                            <li>
                                <div class="iconNavBottom">
                                    <a href="home.html">
                                        <img src="{{ asset('img/home.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="mapel.html">
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
                                    <a href="profile.html">
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
