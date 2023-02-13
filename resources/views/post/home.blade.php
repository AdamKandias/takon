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
    <link rel="stylesheet" href="{{ asset('css/post/home.css') }}">
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
                                    <img src="{{ asset('img/homeColor.svg') }}" width="30" height="30"
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
                            <a href="{{ route('profile') }}" class="d-flex text-decoration-none text-dark">
                                <div class="iconNav">
                                    <img src="{{ asset('img/user.svg') }}" width="30" height="30"
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
                <div class="topbar px-3 sticky-top gap-2 d-flex justify-content-center align-items-center">
                    <div class="namePage">
                        Home
                    </div>

                    <div class="imgLogo logoPhone">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="d-flex align-items-center SB">
                        <div class="col-1 iconSB d-flex justify-content-center">
                            <img src="{{ asset('img/search.png') }}">
                        </div>
                        <input type="text" class="col inputSB inputSB-mid"
                            placeholder="Cari pertanyaan atau jawaban">
                    </div>

                </div>
                <div class="contents">
                    <div class="heroContent px-4 py-5">
                        <div class="mb-4">
                            <div class="heroitem1 d-flex">
                                <div class="iconItem"></div>
                                <span>Tanyakan pertanyaanmu kapanpun!</span>
                            </div>
                            <span class="fs-2 fw-semibold">Punya Pertanyaan?</span>
                        </div>
                        <a href="{{ route('ask') }}">
                            <button class="btn btn-dark btnHero px-4">TANYAKAN SEKARANG</button>
                        </a>
                    </div>

                    <div class="shortby px-4 mb-3">
                        <div>
                            <div class="shortIcon"></div>
                            <span>Tampilkan pertanyaan sesuai</span>
                        </div>
                        <div class="dropdown">
                            <button class="justify-content-between align-items-center py-2 btnDropdown d-flex"
                                type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                aria-expanded="false">
                                <div class="nameShortby">
                                    <span>Terbaru, </span><span>Belum Terjawab</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30"
                                        viewBox="0 0 25 30">
                                        <path fill="#fff"
                                            d="M16.682 19.674c.01-.012.014-.028.024-.04l6.982-7.714c.39-.434.39-1.138 0-1.572-.004-.004-.008-.006-.012-.008a.936.936 0 0 0-.712-.34H8.998a.948.948 0 0 0-.722.352l-.004-.004a1.202 1.202 0 0 0 0 1.572l6.998 7.754a.928.928 0 0 0 1.412 0z" />
                                    </svg>
                                </div>
                            </button>
                            <ul class="p px-3 py-2 dropdown-menu">
                                <li class="border-listshort">
                                    <ul>
                                        <li class="margin-listdown">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input mt-0" type="checkbox" value=""
                                                    id="checkTerbaru">
                                                <label class="form-check-label col" for="checkTerbaru">
                                                    Terbaru
                                                </label>
                                            </div>
                                        </li>
                                        <li class="margin-listdown">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input mt-0" type="checkbox" value=""
                                                    id="checkTerlama">
                                                <label class="form-check-label col" for="checkTerlama">
                                                    Terlama
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li class="margin-listdown">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input mt-0" type="checkbox" value=""
                                                    id="checkTerbaru">
                                                <label class="form-check-label col" for="checkTerbaru">
                                                    Terjawab
                                                </label>
                                            </div>
                                        </li>
                                        <li class="margin-listdown">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input mt-0" type="checkbox" value=""
                                                    id="checkTerlama">
                                                <label class="form-check-label col" for="checkTerlama">
                                                    Belum Terjawab
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (Session::has('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    @foreach ($posts as $post)
                        <a class="text-decoration-none text-dark row g-0" href="detailPost.html">
                            <div class="content px-4 py-2">
                                <div class="headerContent d-flex py-2">
                                    <img src="{{ asset('img/avatar' . $post->user->image . '.png') }}" class="avatar me-2">
                                    <div class="names col row align-items-center g-0">
                                        <div class="nameCnt">{{ $post->user->name }} <span class="dot">•</span>
                                            <span class="dateUpload">{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <span class="mapelCnt">{{ $post->mapel->mapel }}</span>
                                    </div>
                                    <div class="moreAction col-1"></div>
                                </div>
                                <div class="text-truncate-container"><p class="">{{ $post->question }}</p></div>
                                <div class="bottomContent my-2">
                                    <span class="bottomContent1">Belum terjawab <span
                                            class="dot mx-1">•</span></span>
                                    <span class="seeMore">Lihat</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <nav class="navBottom fixed-bottom bg-light">
                    <div>
                        <ul class="d-flex m-0">
                            <li>
                                <div class="iconNavBottom">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('img/homeColor.svg') }}" width="30" height="30"
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
                                    <a href="{{ route('profile') }}">
                                        <img src="{{ asset('img/user.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>

            <!-- --RIGHT-- -->
            <div class="right px-2">
                <div class="rightTopbar sticky-top align-items-center d-flex">
                    <div class="d-flex align-items-center SB mx-1">
                        <div class="col-1 iconSB d-flex justify-content-center">
                            <img src="{{ asset('img/search.png') }}">
                        </div>
                        <input type="text" class="col inputSB" placeholder="Cari pertanyaan atau jawaban">
                    </div>
                </div>
                <div class="myprofile">
                    <div class="row g-0 py-3 justify-content-center align-items-center">
                        <img src="{{ asset('img/avatar' . Auth::user()->image . '.png') }}" class="big-avatar">
                        <div class="text-center">
                            <span class="fw-semibold">{{ Auth::user()->name }}</span><br>
                            <span class="me-1">{{ Auth::user()->point }} poin</span>
                        </div>
                    </div>

                    <div class="infoProfile">
                        <div class="infoProfile1 px-3 py-2">
                            <span class="me-1">0</span>Mengajukan Pertanyaan
                        </div>
                        <div class="infoProfile2 px-3 py-2">
                            <span class="me-1">0</span>Memberikan Jawaban
                        </div>
                    </div>
                </div>

                <div class="pt-4 mt-4">
                    <div class="d-flex justify-content-between px-4 mb-4">
                        <span class="subTask">Top Rank</span>
                        <div class="iconRank">
                            <img src="{{ asset('img/trophy.png') }}">
                        </div>
                    </div>
                    @foreach ($topRank as $user)
                        <div class="d-flex justify-content-center align-items-center listRank px-4 pb-4">
                            <div class="col-2 me-1">
                                <div class="rankProfile">
                                    <img src="{{ asset('img/avatar' . $user->image . '.png') }}">
                                </div>
                            </div>
                            <div class="col d-flex justify-content-between">
                                <div class="rankName"><span>{{ $user->name }}</span></div>
                                <div class="rankPoin"><span>{{ $user->point }} Poin</span></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center align-items-center moreActionList py-3"><span>Lihat
                            lainnya</span></div>
                </div>
                <div class="footer my-5">
                    <div class="d-flex justify-contentc-center">
                        <div class="px-1 footerText">About</div>
                        <div class="px-1 footerText">Terms of Use</div>
                        <div class="px-1 footerText">Cookie Policy</div>
                    </div>
                    <div class="d-flex justify-contentc-center">
                        <div class="px-1 footerText">Guidelines</div>
                        <div class="px-1 footerText">Privacy Policy</div>
                        <div class="px-1 footerText">More...</div>
                    </div>
                    <hr>
                    <div class="footerText">
                        Takon Inc © 2023. All rights reserved
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
