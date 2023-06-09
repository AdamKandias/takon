<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reports Dashboard | Takon</title>
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
                            <h5 class="text-primary">Reports</h5>
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
            <h2>REPORTS DASHBOARD</h2>
            <p>Manage all reported posts, answers, and comments in apps, you can see the detail of it, aprrove it, and
                delete it.</p>
            @if (Session::has('status'))
                <div class="alert alert-success text-center py-2 mb-2" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <table class="table table-light" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Reported Type</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if (isset($report->post_id))
                                    Post Report
                                @elseif (isset($report->answer_id))
                                    Answer Report
                                @elseif (isset($report->comment_id))
                                    Comment Report
                                @endif
                            </td>
                            <td>{{ $report->description }}</td>
                            <td>
                                @if (isset($report->post_id))
                                    <a href="#" class="btn btn-primary btn-sm type-post" data-bs-toggle="modal"
                                        data-bs-target="#detailModal" data-link-id="{{ $report->post_id }}">Detail</a>
                                    <a href="#" class="btn btn-danger btn-sm type-post" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-link-id="{{ $report->post_id }}">Delete</a>
                                    <a href="#" class="btn btn-success btn-sm type-post" data-bs-toggle="modal"
                                        data-bs-target="#approveModal"
                                        data-link-id="{{ $report->post_id }}">Approve</a>
                                @elseif (isset($report->answer_id))
                                    <a href="#" class="btn btn-primary btn-sm type-answer" data-bs-toggle="modal"
                                        data-bs-target="#detailModal"
                                        data-link-id="{{ $report->answer_id }}">Detail</a>
                                    <a href="#" class="btn btn-danger btn-sm type-answer" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-link-id="{{ $report->answer_id }}">Delete</a>
                                    <a href="#" class="btn btn-success btn-sm type-answer" data-bs-toggle="modal"
                                        data-bs-target="#approveModal"
                                        data-link-id="{{ $report->answer_id }}">Approve</a>
                                @elseif (isset($report->comment_id))
                                    <a href="#" class="btn btn-primary btn-sm type-comment" data-bs-toggle="modal"
                                        data-bs-target="#detailModal"
                                        data-link-id="{{ $report->comment_id }}">Detail</a>
                                    <a href="#" class="btn btn-danger btn-sm type-comment" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-link-id="{{ $report->comment_id }}">Delete</a>
                                    <a href="#" class="btn btn-success btn-sm type-comment" data-bs-toggle="modal"
                                        data-bs-target="#approveModal"
                                        data-link-id="{{ $report->comment_id }}">Approve</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Detail Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        <!-- Approve Modal -->
        <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="my-3"></h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success w-100" data-bs-dismiss="modal">Approve</button>
                    </form>
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
            var linkId = $(this).data('link-id');
            var type = $(this).hasClass('type-post') ? 'post' :
                $(this).hasClass('type-answer') ? 'answer' :
                $(this).hasClass('type-comment') ? 'comment' : '';
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/dashboard/report-show/' + linkId + '?type=' + type,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#detailModal .modal-body').empty();
                    let type = '';
                    if (response[0].post) {
                        type = 'Post';
                    } else if (response[0].answer) {
                        type = 'Answer';
                    } else {
                        type = 'Comment';
                    }

                    var html = `
                            <div class="d-flex">
                                <strong>Reported Type: </strong>
                                <span class="ms-1">${type}</span>
                            </div>
                            <div class="d-flex">
                                <strong>Post Mapel: </strong>
                                <span class="ms-1">${type === 'Post' ? response[0].post.mapel.mapel : type === 'Answer' ? response[0].answer.post.mapel.mapel : response[0].comment.answer.post.mapel.mapel}</span>
                            </div>
                            <div class="d-flex">
                                <strong>Content: </strong>
                                <span class="ms-1">${type === 'Post' ? response[0].post.question : type === 'Answer' ? response[0].answer.answer : response[0].comment.comment}</span>
                            </div>
                            <hr>`;
                    $('#detailModal .modal-body').append(html);

                    response.forEach(function(item, index) {
                        var html = `
                            <div class="d-flex justify-content-center fw-bold">Report ${index+1}</div>
                            <div class="d-flex">
                                <strong>Report Description: </strong>
                                <span class="ms-1">${item.description}</span>
                            </div>
                            <div class="d-flex">
                                <strong>Reporting User: </strong>
                                <span class="ms-1">${item.user.name}</span>
                            </div>
                            <hr>`;
                        $('#detailModal .modal-body').append(html);
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $('.btn[data-bs-target="#deleteModal"]').click(function() {
            var linkId = $(this).data('link-id');
            var type = $(this).hasClass('type-post') ? 'post' :
                $(this).hasClass('type-answer') ? 'answer' :
                $(this).hasClass('type-comment') ? 'comment' : '';
            var token = $('meta[name="csrf-token"]').attr('content');
            var deleteUrl = '{{ route('reportDestroy', [':linkId']) }}';
            deleteUrl = deleteUrl.replace(':linkId', linkId) + '?type=' + type;
            $.ajax({
                url: '/dashboard/report-show/' + linkId + '?type=' + type,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#deleteModal .modal-body h4').text('Delete This ' + type.charAt(0)
                        .toUpperCase() + type.slice(1) + '?');
                    $('#deleteModal form').attr('action', deleteUrl);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $('.btn[data-bs-target="#approveModal"]').click(function() {
            var linkId = $(this).data('link-id');
            var type = $(this).hasClass('type-post') ? 'post' :
                $(this).hasClass('type-answer') ? 'answer' :
                $(this).hasClass('type-comment') ? 'comment' : '';
            var token = $('meta[name="csrf-token"]').attr('content');
            var approveUrl = '{{ route('reportUpdate', [':linkId']) }}';
            approveUrl = approveUrl.replace(':linkId', linkId) + '?type=' + type;
            $.ajax({
                url: '/dashboard/report-show/' + linkId + '?type=' + type,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#approveModal .modal-body h4').text('Approve This ' + type.charAt(0)
                        .toUpperCase() + type.slice(1) + '?');
                    $('#approveModal form').attr('action', approveUrl);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    </script>
</body>

</html>
