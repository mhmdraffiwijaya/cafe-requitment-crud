@extends('thema')

@section('konten')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Selamat Datang,</h2>
                        <p class="mb-md-0">di website penerimaan pegawai cafe</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="row" id="proBanner">
                <div class="col-12">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-primary card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">Data Daftar Lamaran <i
                                    class="mdi mdi-briefcase-download mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"></h2>
                            <a href="/viewdatapelamar" class="text-decoration-none text-white">
                                <h6 class="card-text">View Detail </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-primary card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">Data Pelamar Masuk<i
                                    class="mdi mdi-briefcase-upload mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"></h2>
                            <a href="/viewdatadaftarpelamar" class="text-decoration-none text-white">
                                <h6 class="card-text">View Detail </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-primary card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">Data User <i
                                    class="mdi mdi-account mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"></h2>
                            <a href="/view-user" class="text-decoration-none text-white">
                                @if (auth()->user()->level == 'Admin')
                                    <h6 class="card-text"> View Detail</h6>
                                @endif
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
