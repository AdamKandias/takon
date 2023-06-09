<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comments Dashboard | Takon</title>
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
            <div class="listbar-leftbar bg-dark">
                <div class="list-bar">
                    <div class="item-nav">
                        <a href="{{ route('dashboard') }}">
                            <h5>Users</h5>
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
                            <h5 class="text-primary">Comments</h5>
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
            <h2>COMMENTS DASHBOARD</h2>
            <p>Manage all users comments in apps, you can see the detail of it and you can delete it.</p>
            @if (Session::has('status'))
                <div class="alert alert-success text-center py-2 mb-2" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <table class="table table-light" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Comment</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-truncate" style="max-width: 600px">{{ $comment->comment }}</td>
                            <td class="text-truncate" style="max-width: 200px">{{ $comment->user->name }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-comment-id="{{ $comment->id }}">Detail</a>
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-comment-id="{{ $comment->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <img src="" class="img-profile-user-modal">
                    </div>
                    <div class="modal-body">
                        <h4 class="my-3"></h4>
                        <div class="d-flex">
                            <strong>Comment:</strong>
                            <p class="ms-1 comment-modal"></p>
                        </div>
                        <div class="d-flex">
                            <strong>Posted At:</strong>
                            <p class="ms-1 created-at-modal"></p>
                        </div>
                        <div class="d-flex">
                            <strong>Like Count:</strong>
                            <p class="ms-1 like-modal"></p>
                        </div>
                        <div class="d-flex">
                            <strong>Total Reports:</strong>
                            <p class="ms-1 m-0 reports-modal"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="my-3">Are You Sure To Delete This Comment?</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <button class="btn btn-danger w-100" data-bs-dismiss="modal">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $('.btn[data-bs-target="#detailModal"]').click(function() {
            var commentId = $(this).data('comment-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dashboard/comment-show/' + commentId,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log(response);
                    if (response.image) {
                        $('#detailModal .modal-header img').show();
                        $('#detailModal .modal-header img').attr('src', '{{ asset('storage/') }}' +
                            '/' + response.image);
                    } else {
                        $('#detailModal .modal-header img').hide();
                    }
                    $('#detailModal .modal-body h4').text(response.user.name);
                    $('#detailModal .modal-body .comment-modal').text(response.comment);
                    $('#detailModal .modal-body .created-at-modal').text(new Date(response
                        .created_at).toLocaleDateString(undefined, {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }));
                    $('#detailModal .modal-body .like-modal').text(response.like.length);
                    $('#detailModal .modal-body .reports-modal').text(response.reports.length);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
        $('.btn[data-bs-target="#deleteModal"]').click(function() {
            var commentId = $(this).data('comment-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            var deleteUrl = '{{ route('commentDestroy', ':commentId') }}';
            deleteUrl = deleteUrl.replace(':commentId', commentId);
            $.ajax({
                url: '/dashboard/comment-show/' + commentId,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#deleteModal .modal-body h4').text('Are You Sure To Delete This "' + response
                        .user.name + '" Comment?');
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
