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
                            <div class="d-flex gap-2 justify-content-center align-items-center mt-1 mb-3">
                                <div class="role role-{{ Auth::user()->role->id }} px-4 py-2">
                                    {{ Auth::user()->role->role }}</div>
                                <div class="">{{ Auth::user()->point }} Poin</div>
                            </div>
                            <div class="d-flex infoAkun mb-2 gap-4 justify-content-center">
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
                                        <img src="{{ asset('img/person.svg') }}" class="me-2">

                                        <span class="labeldata">Nama Lengkap : <span
                                                class="text-dark valueData">{{ Auth::user()->name }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <img src="{{ asset('img/card.svg') }}" class="me-2">

                                        <span class="labeldata">NISN : <span
                                                class="text-dark valueData">{{ Auth::user()->nisn }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <img src="{{ asset('img/classrom.svg') }}" class="me-2">

                                        <span class="labeldata">Kelas : <span
                                                class="text-dark valueData">{{ Auth::user()->class->class }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <img src="{{ asset('img/birthday.svg') }}"class="me-2">

                                        <span class="labeldata">Tanggal Lahir : <span
                                                class="text-dark valueData">{{ implode('-', array_reverse(explode('-', Auth::user()->birthdate))) }}</span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rowdata d-flex align-items-center">
                                        <img src="{{ asset('img/key.svg') }}"class="me-2">
                                        <span class="labeldata">Password : <span
                                                class="@if (Auth::user()->password) text-success @else text-danger @endif valueData">
                                                @if (Auth::user()->password)
                                                    Password sudah ada,
                                                    <a class="text-decoration-none text-secondary" href=""
                                                        data-bs-toggle="modal" data-bs-target="#edit-pass"><mark
                                                            class="text-primary bg-light">edit password?
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
                                                            class="text-primary bg-light">buat password!
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
