<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cafe</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('thema/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('thema/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('thema/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('thema/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style-2.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('thema/assets/images/inventory.png') }}" />
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/inventory">
                    <img src="{{ asset('thema/assets/images/inventory.svg') }}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini text-center" href="inventory">
                    <img src="{{ asset('thema/assets/images/inventory.svg') }}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                @empty(auth()->user()->file)
                                <img src="{{ asset('thema/assets/images/faces/face1.jpg') }}" alt="image">
                                @else
                                <img src="{{ url('/' . auth()->user()->file) }}" alt="image">
                                @endempty
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/logout">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Logout </a>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardadmin">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    @if (auth()->user()->level == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="viewuser">
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Data User</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->level == 'Admin'||
                    auth()->User()->level == 'Pelamar' )
                    <li class="nav-item">
                        <a class="nav-link" href="viewdatadaftarpelamar">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Data Daftar Lamaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewdatapelamar">
                            <i class="mdi mdi-account-plus menu-icon"></i>
                            <span class="menu-title">Data Pelamar Masuk</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="logout">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Log Out</span>
                        </a>
                    </li>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                            </div>
                            @yield('konten')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('thema/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('thema/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('thema/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('thema/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('thema/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('thema/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('thema/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Custom js for this page -->
    <script src="{{ asset('thema/assets/js/file-upload.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('thema/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "csv"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>