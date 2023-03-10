<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Takon</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
      aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="{{ route("logout") }}" method="post">
          @csrf
          <button type="submit" class="nav-link px-3" href="#">Sign out</button>
        </form>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="user-check" class="align-text-bottom"></span>
                Answers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="message-circle" class="align-text-bottom"></span>
                Comments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Reports
              </a>
            </li>
          </ul>

          <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Account</span>
          </h6>
          <ul class="nav flex-column mt-3">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="user" class="align-text-bottom"></span>
                My Account
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1>Halo Admin {{ Auth::user()->name }}</h1>
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar" class="align-text-bottom"></span>
              This week
            </button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm" style="table-layout: fixed; width: 100%;">
            <thead>
              <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 55%;">Post</th>
                <th style="width: 20%;">Mapel</th>
                <th style="width: 15%;">Created At</th>
                <th style="width: 5%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="text-truncate">Apa yang dimaksud Logaritma? jelaskan!</td>
                <td>Matematika</td>
                <td>1 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td class="text-truncate">Buatlah puisi bertemakan kemerdekaan indonesia</td>
                <td>Bahasa Indonesia</td>
                <td>4 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                <td>Sejarah</td>
                <td>10 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis vel omnis soluta.</td>
                <td>Matematika</td>
                <td>14 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td class="text-truncate">nm odit quasi magnam voluptatem.</td>
                <td>Matematika</td>
                <td>17 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td class="text-truncate">Lorem  commodi, tempora magni recusandae, cumque distinct</td>
                <td>Bahasa Indonesia</td>
                <td>20 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                <td>Ppkn</td>
                <td>22 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                <td>Bahasa Indonesia</td>
                <td>26 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet.</td>
                <td>Ppkn</td>
                <td>29 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Modi aspernatur illo excepturi, ut accusamus quia distinctio quas consequuntur expedita atque
                  quisquam, iste optio placeat officiis culpa nostrum. Dolor, vitae nobis numquam, fugit earum iste
                  deleniti impedit aut, libero ab tenetur voluptas ad at modi distinctio nemo placeat! Itaque, deleniti
                  blanditiis!</td>
                <td>Matematika</td>
                <td>31 Minute ago</td>
                <td>
                  <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;">View</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>


  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>