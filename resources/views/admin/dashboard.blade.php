<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Users Dashboard | Takon</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="g-0 container-fluid d-flex" style="height: 100vh;">
        <nav class="col-2 bg-primary left-bar">
            <div class="header-leftbar bg-primary">
                <div class="d-flex justify-content-center">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.B2IsP6Pia_Y8NnueMePb6gHaGJ%26pid%3DApi&f=1&ipt=8182b44b5f106eed14e6be84f6e92f616cd6a234c1509b7771c0b38d77b47bab&ipo=images"
                        class="img-profile-admin">
                    <h4 style="line-height: 4rem;">Hai {{ Auth::user()->name }}</h4>
                </div>
            </div>
            <div class="listbar-leftbar bg-dark h100">
                <div class="list-bar">
                    <div class="item-nav">
                        <a href="{{ route('dashboard') }}">
                            <h5 class="text-primary">Users</h5>
                        </a>
                    </div>
                    <div class="item-nav">
                        <a href="{{ route('dashboardReports') }}">
                            <h5>Reports</h5>
                        </a>
                    </div>
                    <div class="item-nav">
                        <a href="{{ route('dashboardPosts') }}">
                            <h5>Posts</h5>
                        </a>
                    </div>
                    <div class="item-nav">
                        <a href="{{ route('dashboardAnswers') }}">
                            <h5>Answers</h5>
                        </a>
                    </div>
                    <div class="item-nav">
                        <a href="{{ route('dashboardComments') }}">
                            <h5>Comments</h5>
                        </a>
                    </div>
                    <div class="item-nav">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="p-0 m-0 border-0 bg-transparent text-white" type="submit">
                                <h5>Logout</h5>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="col ps-3 pe-4 py-5">
            <h2>USERS DASHBOARD</h2>
            <p>Manage all users (students) in apps, you can see the detail of user and banning them.</p>
            @if (Session::has('status'))
                <div class="alert alert-success text-center py-2 mb-2" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <table class="table table-light" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>NISN</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nisn }}</td>
                            <td>{{ $user->class->class }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-user-id="{{ $user->id }}">Detail</a>
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-user-id="{{ $user->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <img src="" class="img-profile-user-modal">
                        </div>
                        <div class="modal-body">
                            <h4 class="my-3"></h4>
                            <div class="d-flex">
                                <strong>Role :</strong>
                                <p class="ms-2 px-3 py-1 role role-"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Nisn :</strong>
                                <p class="ms-1 nisn-modal"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Class :</strong>
                                <p class="ms-1 class-modal"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Birthdate :</strong>
                                <p class="ms-1 birthdate-modal"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Point :</strong>
                                <p class="ms-1 point-modal"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Folowers :</strong>
                                <p class="ms-1 followers-modal"></p>
                            </div>
                            <div class="d-flex">
                                <strong>Following :</strong>
                                <span class="ms-1 following-modal"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4 class="my-3"></h4>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <button class="btn btn-danger w-100" data-bs-dismiss="modal">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $('.btn[data-bs-target="#detailModal"]').click(function() {
            var userId = $(this).data('user-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dashboard/user-show/' + userId,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#detailModal .modal-header img').attr('src',
                        '{{ asset('storage/') }}' + '/' + response.image);
                    $('#detailModal .modal-body h4').text(response.name);
                    $('#detailModal .modal-body [class*="role-"]').attr('class', function(
                        index, classNames) {
                        return classNames.split(' ').map(function(className) {
                            if (className.startsWith('role-')) {
                                return 'role-' + response.role.id;
                            }
                            return className;
                        }).join(' ');
                    }).text(response.role.role);
                    $('#detailModal .modal-body .nisn-modal').text(response.nisn);
                    $('#detailModal .modal-body .class-modal').text(response.class.class);
                    $('#detailModal .modal-body .birthdate-modal').text(new Date(response
                        .birthdate).toLocaleDateString(undefined, {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }));
                    $('#detailModal .modal-body .point-modal').text(response.point);
                    $('#detailModal .modal-body .followers-modal').text(response
                        .followers.length);
                    $('#detailModal .modal-body .following-modal').text(response
                        .follows.length);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $('.btn[data-bs-target="#deleteModal"]').click(function() {
            var userId = $(this).data('user-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            var deleteUrl = '{{ route('userDestroy', ':userId') }}';
            deleteUrl = deleteUrl.replace(':userId', userId);
            $.ajax({
                url: '/dashboard/user-show/' + userId,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#deleteModal .modal-body h4').text('Delete ' + response.name + '?');
                    $('#deleteModal form').attr('action', deleteUrl);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    </script>
</body>

</html>
