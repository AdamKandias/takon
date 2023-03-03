<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takon</title>

    <!-- LINK CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/notification.css') }}">
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
                            <a href="{{ route('notification') }}"
                                class="d-flex text-decoration-none text-dark position-relative">
                                <div class="iconNav">
                                    <img src="{{ asset('img/notificationColor.svg') }}" width="30" height="30"
                                        viewBox="0 0 24 24">
                                </div>
                                @if (Auth::user()->unreadNotifications->count())
                                    <span
                                        class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                                <div class="nameNav col">
                                    Notifikasi
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
                <div class="topbar sticky-top d-flex justify-content-center align-items-center">
                    <div class="namePage">
                        Detail Notifikasi
                    </div>
                </div>
                <div class="contents">
                    <a class="text-reset text-decoration-none" href="{{ $notification->category == "follow" ? route('user.show', $notification->link_id) : route('post.show', $notification->link_id) }}">
                        <div class="notif d-flex px-3 py-4">
                            <div class="col">
                                <div class="contentNotif">{{ $notification->body }}</div>
                                <span class="dateUpload">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                    <button type="button" class="btn btn-danger d-flex mx-auto btn-sm mt-2" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <span>Delete</span>
                    </button>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <form action="{{ route('notification.destroy', $notification->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span>Yakin akan menghapus notifikasi ini?</span>
                                    <button type="submit" class="btn btn-danger btn-sm ms-1">Hapus Sekarang</button>
                                </form>
                            </div>
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
                                    <a href="{{ route('notification') }}" class="position-relative">
                                        <img src="{{ asset('img/notificationColor.svg') }}" width="30"
                                            height="30" viewBox="0 0 24 24">
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
                <div class="myprofile">
                    <a href="{{ route('profile') }}" class="text-decoration-none text-reset">
                        <div class="row g-0 py-3 justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="avatarProfile">
                            <div class="text-center">
                                <span class="fw-semibold">{{ Auth::user()->name }}</span><br>
                                <span class="me-1">{{ Auth::user()->point }} Poin</span>
                            </div>
                        </div>
                    </a>

                    <div class="infoProfile">
                        <a class="text-decoration-none text-primary" href="{{ route('userPost') }}">
                            <div class="infoProfile1 px-3 py-2">
                                <span class="me-1">{{ Auth::user()->posts->count() }}</span>Mengajukan
                                Pertanyaan
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('userAnswer') }}">
                            <div class="px-3 py-2">
                                <span class="me-1">{{ Auth::user()->answers->count() }}</span>Memberikan Jawaban
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('userComment') }}">
                            <div class="px-3 py-2">
                                <span class="me-1">{{ Auth::user()->comments->count() }}</span>Memberikan
                                Komentar
                            </div>
                        </a>
                        <a class="text-decoration-none text-primary" href="{{ route('friends') }}">
                            <div class="px-3 py-2">
                                <span class="me-1"></span> Lihat Postingan Teman
                            </div>
                        </a>
                    </div>
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
