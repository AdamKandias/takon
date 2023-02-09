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
                                    <img src="{{ asset('img/notificationColor.svg') }}" width="30" height="30"
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
                        Notification
                    </div>
                </div>
                <div class="contents">
                    <div class="notif d-flex px-3 py-2 nonReadNotif">
                        <img class="avatar me-2" src="{{ asset('img/avatar1.png') }}" alt="">
                        <div class="col">
                            <div class="nameNotif">User123 <span class="dot">•</span> <span
                                    class="dateUpload">2022-11-16</span></div>
                            <div class="contentNotif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                expedita iste quo? Ea illo reprehenderit possimus reiciendis, perspiciatis quibusdam
                                molestias!</div>
                        </div>
                    </div>
                    <div class="notif d-flex px-3 py-2">
                        <img class="avatar me-2" src="{{ asset('img/avatar1.png') }}" alt="">
                        <div class="col">
                            <div class="nameNotif">User123 <span class="dot">•</span> <span
                                    class="dateUpload">2022-11-16</span></div>
                            <div class="contentNotif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                expedita iste quo? Ea illo reprehenderit possimus reiciendis, perspiciatis quibusdam
                                molestias!</div>
                        </div>
                    </div>
                    <div class="notif d-flex px-3 py-2">
                        <img class="avatar me-2" src="{{ asset('img/avatar1.png') }}" alt="">
                        <div class="col">
                            <div class="nameNotif">User123 <span class="dot">•</span> <span
                                    class="dateUpload">2022-11-16</span></div>
                            <div class="contentNotif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                expedita iste quo? Ea illo reprehenderit possimus reiciendis, perspiciatis quibusdam
                                molestias!</div>
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
                                        <img src="{{ asset('img/notificationColor.svg') }}" width="30"
                                            height="30" viewBox="0 0 24 24">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="iconNavBottom">
                                    <a href="profile.html">
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
                        <img class="avatarProfile" src="{{ asset('img/avatar2.jpg') }}" alt="">
                        <div class="text-center">
                            <span class="fw-semibold">Mike Wazowski</span><br>
                            <span class="me-1">300 Poin</span>
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
</body>

</html>
