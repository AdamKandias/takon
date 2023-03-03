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
    <link rel="stylesheet" href="{{ asset('css/post/detail-post.css') }}">
    <script src="https://unpkg.com/lite-editor@1.6.39/js/lite-editor.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/lite-editor@1.6.39/css/lite-editor.css">
</head>

<body onload="init();">

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
                <div class="topbar sticky-top d-flex justify-content-center align-items-center">
                    <div class="namePage">
                        {{ $post->mapel->mapel }}
                    </div>
                </div>
                <div class="contents">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <a class="text-decoration-none text-reset"
                                href="{{ route('user.show', $post->user->id) }}">
                                <img src="{{ asset('storage/' . $post->user->image) }}" alt=""
                                    class="avatar me-2">
                                <div class="names col row align-items-center g-0">
                                    <div class="nameCnt">{{ $post->user->name }}
                            </a>
                            <span class="dot">•</span>
                            <span class="dateUpload">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <a class="text-decoration-none text-reset" style="width: fit-content"
                            href="{{ route('mapel', ['mapel' => $post->mapel->mapel]) }}">
                            <span style="" class="mapelCnt">{{ $post->mapel->mapel }}</span>
                        </a>
                    </div>
                    <div class="moreAction d-flex gap-1">
                        @if ($post->like->contains('user_id', Auth::user()->id))
                            <form action="{{ route('post.unlike', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-primary">👍 {{ $post->like->count() }}</button>
                            </form>
                        @else
                            <form action="{{ route('post.like', $post->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-primary">👍 {{ $post->like->count() }}</button>
                            </form>
                        @endif
                        @if ($post->reports->contains('user_id', Auth::user()->id))
                            <form action="{{ route('post.unreport', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Batalkan Report</button>
                            </form>
                        @else
                            <div>
                                <button type="button" class="btn-sm btn-danger btn" data-bs-toggle="modal"
                                    data-bs-target="#postReport">Report</button>
                            </div>
                            <div class="modal fade" id="postReport" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="postReportLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="postReportLabel">Report Pertanyaan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('post.report', $post->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="report" class="form-label">Apa alasan anda
                                                    melaporkan:</label>
                                                <select name="report" id="report" class="form-select">
                                                    <option value="Mengandung kata-kata kasar">Mengandung
                                                        kata-kata kasar</option>
                                                    <option value="Pertanyaan diluar konteks pembelajaran">
                                                        Pertanyaan diluar konteks pembelajaran</option>
                                                    <option value="Konten tidak pantas">
                                                        Konten tidak pantas</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Laporkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="pertanyaan mb-3 mt-3">
                    {!! $post->question !!}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}">
                    @endif
                </div>
            </div>
        </div>
        <div class="py-3 text-center fw-bold" style="border-bottom: 1px solid #E6E6E6;">
            JAWABAN
        </div>
        @if (Session::has('status'))
            <div class="alert alert-danger text-center" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
        @if (Session::has('status-success'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('status-success') }}
            </div>
        @endif
        @if ($post->answer)
            @if ($post->answer->reports()->count() < 3)
                <div class="contents" style="background-color: rgba(0, 135, 203, 0.055);">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <a class="text-decoration-none text-reset"
                                href="{{ route('user.show', $post->answer->user->id) }}">
                                <img src="{{ asset('storage/' . $post->answer->user->image) }}" alt=""
                                    class="avatar me-2">
                                <div class="names col row align-items-center g-0">
                                    <div class="nameCnt">{{ $post->answer->user->name }}
                            </a>
                            <span class="dot">•</span>
                            <span class="dateUpload">{{ $post->answer->created_at->diffForHumans() }}</span>
                        </div>
                        <span class="mapelCnt" style="color: #e628e9;">{{ $post->answer->user->role->role }}</span>
                    </div>
                    <div class="moreAction d-flex gap-1">
                        @if ($post->answer->like->contains('user_id', Auth::user()->id))
                            <form action="{{ route('answer.unlike', $post->answer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-primary">👍 {{ $post->answer->like->count() }}</button>
                            </form>
                        @else
                            <form action="{{ route('answer.like', $post->answer->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-primary">👍
                                    {{ $post->answer->like->count() }}</button>
                            </form>
                        @endif
                        @if ($post->answer->reports->contains('user_id', Auth::user()->id))
                            <form action="{{ route('answer.unreport', $post->answer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Batalkan Report</button>
                            </form>
                        @else
                            <div>
                                <button type="button" class="btn-sm btn-danger btn" data-bs-toggle="modal"
                                    data-bs-target="#answerReport">Report</button>
                            </div>
                            <div class="modal fade" id="answerReport" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="answerReportLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="answerReportLabel">Report Jawaban</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('answer.report', $post->answer->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="report" class="form-label">Apa alasan anda
                                                    melaporkan:</label>
                                                <select name="report" id="report" class="form-select">
                                                    <option value="Mengandung kata-kata kasar">Mengandung
                                                        kata-kata kasar</option>
                                                    <option value="Jawaban asal-asalan">Jawaban asal-asalan</option>
                                                    <option value="Jawaban diluar konteks pembelajaran">
                                                        Jawaban diluar konteks pembelajaran</option>
                                                    <option value="Konten tidak pantas">
                                                        Konten tidak pantas</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Laporkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="jawaban mb-2">
                    {!! $post->answer->answer !!}
                    @if ($post->answer->image)
                        <img src="{{ asset('storage/' . $post->answer->image) }}" class="img-fluid">
                    @endif
                </div>
    </div>
    </div>
@else
    <div class="alert alert-danger text-center">
        Jawaban telah dilaporkan!, Sedang diperiksa oleh admin
    </div>
    @endif
@else
    <div class="d-flex px-4 py-2" style="border-bottom: 1px solid #E6E6E6;">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                <ul class="py-0 my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="coment-avatar">
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="avatar">
        </div>
        <div class="d-flex" style="width: 100%;">
            <form action="{{ route('answer.store') }}" style="width: 100%;" method="POST"
                enctype="multipart/form-data">
                @csrf
                <textarea rows="1" name="answer" class="input-comentar py-2 ms-2 js-editor lite-editor"
                    placeholder="Tambahkan jawaban" aria-label="With textarea" id="text"
                    style="border-bottom: 1px solid #E6E6E6; width: 100%"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <img id="output" class="img-fluid mb-4"
                    style="display: none; height: 18rem; width: 100%; object-fit: cover;" />
                <input type="file" name="image" class="form-control" onchange="loadFile(event)">
                <div class="d-flex align-items-center mt-3" style="height: auto;">
                    <button type="submit" class="float-end btn btn-dark px-4"
                        style="background-color: #181818; border-radius: 99px; font-size: 13px;">KIRIM</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <div class="py-2 px-4 fw-semibold" style="border-bottom: 1px solid #E6E6E6;">
        Komentar
    </div>
    @if ($post->answer)
        @if (!$post->answer->comments->isEmpty())
            @foreach ($post->answer->comments as $comment)
                @if ($comment->reports()->count() < 3)
                    <div class="contents">
                        <div class="content px-4 py-2">
                            <div class="headerContent d-flex py-2">
                                <a class="text-decoration-none text-reset"
                                    href="{{ route('user.show', $post->answer->user->id) }}">
                                    <img src="{{ asset('storage/' . $comment->user->image) }}" alt=""
                                        class="avatar me-2">
                                    <div class="names col row align-items-center g-0">
                                        <div class="nameCnt">{{ $comment->user->name }}
                                </a>
                                <span class="dot">•</span>
                                <span class="dateUpload">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <span class="mapelCnt" style="color: #e628e9;">{{ $comment->user->role->role }}</span>
                        </div>
                        <div class="moreAction d-flex gap-1">
                            @if ($comment->like->contains('user_id', Auth::user()->id))
                                <form action="{{ route('comment.unlike', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-primary">👍 {{ $comment->like->count() }}</button>
                                </form>
                            @else
                                <form action="{{ route('comment.like', $comment->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">👍
                                        {{ $comment->like->count() }}</button>
                                </form>
                            @endif
                            @if ($comment->reports->contains('comment_id', $comment->id) && $comment->reports->contains('user_id', Auth::user()->id))
                                <form action="{{ route('comment.unreport', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Batalkan Report</button>
                                </form>
                            @else
                                <div>
                                    <button type="button" class="btn-sm btn-danger btn" data-bs-toggle="modal"
                                        data-bs-target="#commentReport{{ $loop->iteration }}">Report</button>
                                </div>
                                <div class="modal fade" id="commentReport{{ $loop->iteration }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="commentReportLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="commentReportLabel">Report Komentar
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('comment.report', $comment->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <label for="report" class="form-label">Apa alasan anda
                                                        melaporkan:</label>
                                                    <select name="report" id="report" class="form-select">
                                                        <option value="Mengandung kata-kata kasar">Mengandung
                                                            kata-kata kasar</option>
                                                        <option value="Komentar mengandung rasis">
                                                            Komentar mengandung rasis</option>
                                                        <option value="Konten tidak pantas">
                                                            Konten tidak pantas</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Laporkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex g-0 p-0 m-0">
                        <div class="col-1"></div>
                        <div class="comentar mb-2">
                            {!! $comment->comment !!}
                            @if ($comment->image)
                                <img class="img-comment" src="{{ asset('storage/' . $comment->image) }}">
                            @endif
                        </div>
                    </div>
                    </div>
                    </div>
                @endif
            @endforeach
        @endif
        <div class="d-flex px-4 py-2" style="border-bottom: 1px solid #E6E6E6;">
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul class="py-0 my-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="coment-avatar">
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="avatar">
            </div>
            <div class="w-100">
                <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea rows="1" name="comment" class="input-comentar py-2 ms-2 js-editor lite-editor"
                        placeholder="Tambahkan komentar" aria-label="With textarea" id="text"
                        style="border-bottom: 1px solid #E6E6E6;"></textarea>
                    <input type="hidden" name="answer_id" value="{{ $post->answer->id }}">
                    <div class="d-flex w-100">
                        <img id="output" class="img-fluid img-post-comment me-2" style="display: block" />
                        <div class="d-flex align-items-center">
                            <input type="file" name="image" class="form-control" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3 justify-content-end" style="height: auto;">
                        <button type="submit" class="float-end btn btn-dark px-4"
                            style="background-color: #181818; border-radius: 99px; font-size: 13px;">KIRIM</button>
                    </div>
                </form>
            </div>
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
        <div class="myprofile">
            <a href="{{ route('profile') }}" class="text-decoration-none text-reset">
                <div class="row g-0 py-3 justify-content-center align-items-center">
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="avatarProfile">
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
    <script>
        var observe;
        if (window.attachEvent) {
            observe = function(element, event, handler) {
                element.attachEvent('on' + event, handler);
            };
        } else {
            observe = function(element, event, handler) {
                element.addEventListener(event, handler, false);
            };
        }

        function init() {
            var text = document.getElementById('text');

            function resize() {
                text.style.height = 'auto';
                text.style.height = text.scrollHeight + 'px';
            }
            /* 0-timeout to get the already changed text */
            function delayedResize() {
                window.setTimeout(resize, 0);
            }
            observe(text, 'change', resize);
            observe(text, 'cut', delayedResize);
            observe(text, 'paste', delayedResize);
            observe(text, 'drop', delayedResize);
            observe(text, 'keydown', delayedResize);

            text.focus();
            text.select();
            resize();
        }

        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.style.display = "block";
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };

        new LiteEditor('.js-editor');
    </script>
</body>

</html>
