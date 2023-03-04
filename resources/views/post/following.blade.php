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
    <link rel="stylesheet" href="{{ asset('css/post/following.css') }}">
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
                                    <img src="{{ asset('img/homeColor.svg') }}" width="30" height="30"
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
                            <a href="{{ route('notification') }}"
                                class="d-flex text-decoration-none text-reset position-relative">
                                <div class="iconNav">
                                    <img src="{{ asset('img/notification.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                @if (Auth::user()->unreadNotifications->count())
                                    <span
                                        class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                                <div class="nameNav col">
                                    Notification
                                </div>
                            </a>
                        </li>
                        <li class=" row g-0 align-items-center">
                            <a href="{{ route('profile') }}" class="d-flex text-decoration-none text-reset">
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
                        Following
                    </div>

                    <div class="imgLogo logoPhone">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="d-flex align-items-center SB">
                        <form class="d-flex" action="" method="GET">
                            <div class="iconSB d-flex justify-content-center">
                                <button type="submit" class="border-0">
                                    <img class="m-0" src="{{ asset('img/search.png') }}">
                                </button>
                            </div>

                            <input type="text" class="inputSB inputSB-mid" name="search"
                                placeholder="Cari temanmu disini" value="{{ request('search') }}">
                        </form>
                    </div>

                </div>
                <div class="contents">
                    @if (Session::has('status'))
                        <div class="alert alert-danger text-center mb-0" role="alert">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    @foreach ($users as $user)
                        <a class="text-decoration-none text-reset row g-0"
                            href="{{ route('user.show', $user->userFollowing->id) }}">
                            <div class="content px-4 py-2">
                                <div class="headerContent d-flex py-2">
                                    <img src="{{ asset('storage/' . $user->userFollowing->image) }}"
                                        class="avatar me-2">
                                    <div class="names col row align-items-center g-0">
                                        <div class="nameCnt">{{ $user->userFollowing->name }} <span
                                                class="dot">•</span>
                                            <span class="dateUpload">{{ $user->userFollowing->class->class }}</span>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="role role-{{ $user->userFollowing->role->id }} px-2 py-1"
                                                style="font-size: .6rem; line-height: inherit">
                                                {{ $user->userFollowing->role->role }}</div>
                                            <div style="font-size: .8rem; font-weight: 600">
                                                {{ $user->userFollowing->point }} Poin</div>
                                        </div>
                                    </div>
                                    <div class="moreAction col-1"></div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mx-auto d-flex justify-content-center mt-4 mb-2">
                    {{ $users->links() }}
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
                                    <a href="{{ route('mapel') }}">
                                        <img src="{{ asset('img/note.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="{{ route('notification') }}" class="position-relative">
                                        <img src="{{ asset('img/notification.svg') }}" width="30" height="30"
                                            viewBox="0 0 24 24">
                                        @if (Auth::user()->unreadNotifications->count())
                                            <span
                                                class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                        @endif
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
                        <form class="d-flex" action="" method="GET">
                            <div class="ms-1 iconSB d-flex justify-content-center">
                                <button type="submit" class="border-0">
                                    <img class="m-0" src="{{ asset('img/search.png') }}">
                                </button>
                            </div>

                            <input type="text" class="col inputSB" name="search"
                                placeholder="Cari temanmu disini" value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
                <div class="myprofile">
                    <a href="{{ route('profile') }}" class="text-decoration-none text-reset">
                        <div class="row g-0 py-3 justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="big-avatar">
                            <div class="text-center">
                                <span class="fw-semibold">{{ Auth::user()->name }}</span><br>
                                <span class="me-1">{{ Auth::user()->point }} Poin</span>
                            </div>
                        </div>
                    </a>

                    <div class="infoProfile">
                        <a class="text-decoration-none text-primary" href="{{ route('userPost') }}">
                            <div class="infoProfile1 px-3 py-2">
                                <span class="me-1">{{ Auth::user()->posts->count() }}</span>Mengajukan Pertanyaan
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('userAnswer') }}">
                            <div class="px-3 py-2">
                                <span class="me-1">{{ Auth::user()->answers->count() }}</span>Memberikan Jawaban
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('userComment') }}">
                            <div class="px-3 py-2">
                                <span class="me-1">{{ Auth::user()->comments->count() }}</span>Memberikan Komentar
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('friends') }}">
                            <div class="px-3 py-2">
                                <span class="me-1"></span> Lihat Postingan Teman
                            </div>
                        </a>
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
                        <a class="text-reset text-decoration-none" href="{{ route('user.show', $user->id) }}">
                            <div class="d-flex justify-content-center align-items-center listRank px-4 pb-4">
                                <div class="col-2 me-1">
                                    <div class="rankProfile">
                                        <img src="{{ asset('storage/' . $user->image) }}">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-between">
                                    <div class="rankName d-inline-block text-truncate" style="max-width: 140px">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                    <div class="rankPoin"><span>{{ $user->point }} Poin</span></div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <a class="text-decoration-none text-reset" href="{{ route('rank') }}">
                        <div class="d-flex justify-content-center align-items-center moreActionList py-3"><span>Lihat
                                lainnya</span></div>
                    </a>
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
