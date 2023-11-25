@extends('thema')

@section('konten')
    <br>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Daftar Lamaran</h4>
                @if (auth()->user()->level == 'Pelamar')
                    <a href="/inputdatadaftarpelamar" class="btn btn-secondary btn-sm"><i
                            class="fa fa-pencil"></i>&nbsp;Input</a>
                @endif
                <div class="table-responsive pt-3">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No Hp</th>
                                <th>Nama Pelamar</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Posisi</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>
                                    <center>Foto</center>
                                </th>
                                <th>
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                                <tr>
                                    <td>{{ $x->nik }}</td>
                                    <td>{{ $x->nama }}</td>
                                    <td>{{ $x->email }}</td>
                                    <td>{{ $x->alamat }}</td>
                                    <td>{{ $x->agama }}</td>
                                    <td>{{ $x->jenisk }}</td>
                                    <td>{{ $x->status }}</td>
                                    <td>
                                        <center>
                                            @empty($x->fotodpelamar)
                                                <span class="badge badge-danger">Tidak ada</span>
                                            @else
                                                <img src="{{ $x->fotodpelamar }}" width="100px" height="auto" alt="file">
                                            </center>
                                        @endempty

                                    <td>
                                        @if (auth()->user()->level == 'Pelamar')
                                            <center><a href="/editdatadaftarpelamar/{{ $x->id }}"
                                                    class="btn btn-secondary btn-sm"><i
                                                        class="fa fa-pencil"></i>&nbsp;Edit</a>
                                            </center>
                                        @endif
                                        @if (auth()->user()->level == 'Admin')
                                            <center><a href="/noaccdatadaftarpelamar/{{ $x->id }}"
                                                    class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp;No
                                                    Acc</a>
                                                <a href="/accdatadaftarpelamar/{{ $x->id }}"
                                                    class="btn btn-secondary btn-sm"><i
                                                        class="fa fa-pencil"></i>&nbsp;Acc</a>
                                                <a href="/deletedatadaftarpelamar/{{ $x->id }}"
                                                    onclick="return confirm('Apa anda yakin ingin menghapus data?');"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i>&nbsp;Delete</a>
                                            </center>
                                        @endif
                                        </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
