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
                <div class="topbar sticky-top d-flex justify-content-center align-items-center">
                    <div class="namePage">
                        {{ $post->mapel->mapel }}
                    </div>
                </div>
                <div class="contents">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <img src="{{ asset('img/avatar' . $post->user->image . '.png') }}" alt="" class="avatar me-2">
                            <div class="names col row align-items-center g-0">
                                <div class="nameCnt">{{ $post->user->name }} <span class="dot">•</span>
                                    <span class="dateUpload">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <span class="mapelCnt">{{ $post->mapel->mapel }}</span>
                            </div>
                            <div class="moreAction col-1"></div>
                        </div>
                        <div class="pertanyaan mb-3 mt-3">
                            {{ $post->question }}
                        </div>
                    </div>
                </div>
                <div class="py-3 text-center" style="border-bottom: 1px solid #E6E6E6;">
                    JAWABAN
                </div>
                <div class="contents" style="background-color: rgba(0, 135, 203, 0.055);">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar me-2">
                            <div class="names col row align-items-center g-0">
                                <div class="nameCnt">Mike Wazowski <span class="dot">•</span>
                                    <span class="dateUpload">14-11-2022</span>
                                </div>
                                <span class="mapelCnt" style="color: #e628e9;">Sepuh</span>
                            </div>
                            <div class="moreAction col-1"></div>
                        </div>
                        <div class="jawaban mb-2">
                            m(x-x1) + y1 <br>= 7(x-3) -4 <br>= 7x - 21 - 4 <br>= 7x - 25
                        </div>
                    </div>
                </div>

                <div class="d-flex px-4 py-2" style="border-bottom: 1px solid #E6E6E6;">
                    <div class="coment-avatar">
                        <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar">
                    </div>
                    <div class="d-flex" style="width: 100%;">
                        <textarea rows="1" class="input-comentar py-2 ms-2" placeholder="Tambahkan komentar"
                            aria-label="With textarea" id="text" style="border-bottom: 1px solid #E6E6E6;"></textarea>
                        <div class="d-flex align-items-center" style="height: auto;">
                            <button type="button" class="float-end btn btn-dark px-4"
                                style="background-color: #181818; border-radius: 99px; font-size: 13px;">KIRIM</button>
                        </div>
                    </div>
                </div>
                <div class="py-2 px-4 fw-semibold" style="border-bottom: 1px solid #E6E6E6;">
                    Komentar
                </div>
                <div class="contents">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar me-2">
                            <div class="names col row align-items-center g-0">
                                <div class="nameCnt">Mike Wazowski <span class="dot">•</span>
                                    <span class="dateUpload">14-11-2022</span>
                                </div>
                                <span class="mapelCnt">Membalas <span style="color: #34B3F1;">@Mike
                                        Wazowski</span></span>
                            </div>
                            <div class="moreAction col-1"></div>
                        </div>
                        <div class="d-flex g-0">
                            <div style="width: 40px;"></div>
                            <div class="comentar col mb-2 ms-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias soluta provident cum
                                animi deleniti!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar me-2">
                            <div class="names col row align-items-center g-0">
                                <div class="nameCnt">Mike Wazowski <span class="dot">•</span>
                                    <span class="dateUpload">14-11-2022</span>
                                </div>
                                <span class="mapelCnt">Membalas <span style="color: #34B3F1;">@Mike
                                        Wazowski</span></span>
                            </div>
                            <div class="moreAction col-1"></div>
                        </div>
                        <div class="d-flex g-0">
                            <div style="width: 40px;"></div>
                            <div class="comentar col mb-2 ms-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias soluta provident cum
                                animi deleniti!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content px-4 py-2">
                        <div class="headerContent d-flex py-2">
                            <img src="{{ asset('img/avatar1.png') }}" alt="" class="avatar me-2">
                            <div class="names col row align-items-center g-0">
                                <div class="nameCnt">Mike Wazowski <span class="dot">•</span>
                                    <span class="dateUpload">14-11-2022</span>
                                </div>
                                <span class="mapelCnt">Membalas <span style="color: #34B3F1;">@Mike
                                        Wazowski</span></span>
                            </div>
                            <div class="moreAction col-1"></div>
                        </div>
                        <div class="d-flex g-0">
                            <div style="width: 40px;"></div>
                            <div class="comentar col mb-2 ms-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias soluta provident cum
                                animi deleniti!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                    <div>Tidak Ada Komentar</div>
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
                        <div class="col-1 iconSB d-flex justify-content-center mx-2">
                            <img src="{{ asset('img/search.png') }}">
                        </div>
                        <input type="text" class="col inputSB" placeholder="Cari pertanyaan atau jawaban">
                    </div>
                </div>
                <div class="myprofile">
                    <div class="row g-0 py-3 justify-content-center align-items-center">
                        <img src="{{ asset('img/avatar' . Auth::user()->image . '.png') }}" alt="" class="avatarProfile">
                        <div class="text-center">
                            <span class="fw-semibold">{{ Auth::user()->name }}</span><br>
                            <span class="me-1">{{ Auth::user()->point }} Poin</span>
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
                        Takon Inc © 2022. All rights reserved
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
    </script>
</body>

</html>