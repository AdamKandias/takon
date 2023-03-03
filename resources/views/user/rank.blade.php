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
    <link rel="stylesheet" href="{{ asset('css/user/rank.css') }}">
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
                <div class="topbar sticky-top d-flex">
                    <div class="void-box col-4"></div>
                    <div class="namePage col-4 d-flex justify-content-center align-items-center">
                        Top Rank
                    </div>
                </div>
                <div class="contents">
                    @foreach ($rank as $user)
                        <a class="text-reset text-decoration-none" href="{{ route('user.show', $user->id) }}">
                            <div
                                class="{{ $user->id == Auth::user()->id ? 'bg-primary' : '' }} d-flex justify-content-center align-items-center listRank px-4 py-2">
                                <div class="me-3">
                                    <div class="rankProfile d-flex align-items-center">
                                        <span class="me-2">
                                            Rank {{ $rank->currentPage() * 10 - 10 + $loop->iteration }}
                                        </span>
                                        <img src="{{ asset('storage/' . $user->image) }}">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-between">
                                    <div class="rankName"><span>{{ $user->name }}</span></div>
                                    <div class="rankPoin"><span>{{ $user->point }} Poin</span></div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @if ($rank->lastPage() != 1)
                        <div class="mx-auto d-flex justify-content-center mt-4 mb-2">
                            {{ $rank->links() }}
                        </div>
                    @endif
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
                                            <img src="{{ asset('img/notification.svg') }}" width="30"
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
