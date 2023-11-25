<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cafe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('thema/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('thema/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('thema/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('thema/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('thema/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="{{asset('thema/css" href="js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('thema/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/cafe.png" />
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <!--  <a class="navbar-brand brand-logo" href="index.html"><img src="" style="width:300px;height:40px;"></a>-->
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-format-list-bulleted"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-4 w-100">
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <th class="nav-profile-name">{{ auth()->user()->name }}</th>
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
                    <a class="nav-link" href="../dashboardadmin">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @if (auth()->user()->level == 'Admin')
                <li class="nav-item">
                    <a class="nav-link" href="../viewuser">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Data User</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->level == 'Admin'||
                auth()->User()->level == 'Pelamar' )

                <li class="nav-item">
                    <a class="nav-link" href="../viewdatadaftarpelamar">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Data Daftar Lamaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../viewdatapelamar">
                        <i class="mdi mdi-account-plus menu-icon"></i>
                        <span class="menu-title">Data Pelamar Masuk</span>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="../logout">
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
    <script src="{{asset('Admin/vendors/base/vendor.bundle.base.js')}}">
    </script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('Admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('Admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('Admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('Admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('Admin/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('Admin/js/dashboard.js')}}"></script>
    <script src="{{asset('Admin/js/data-table.js')}}"></script>
    <script src="{{asset('Admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('Admin/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->

    <script src="{{asset('Admin/js/jquery.cookie.js" type="text/javascript')}}"></script>

    <!-- jQuery -->
    <script src="{{asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "pdf", "print"]
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