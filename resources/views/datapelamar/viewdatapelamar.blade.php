@extends('thema')

@section('konten')

<br>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pelamar Masuk</h4>
            @if (auth()->user()->level == 'Admin'||
            auth()->User()->level == 'Peminjam' )
            <a href="/inputdatapelamar" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Input</a>
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
                            <td>
                                <center>
                                    @empty($x->fotopelamar)
                                    <span class="badge badge-danger">Tidak ada</span>
                                    @else
                                    <img src="{{ $x->fotopelamar }}" width="100px" height="auto" alt="file">
                                </center>
                                @endempty


                            <th>@if (auth()->user()->level == 'Pelamar')
                                <center>
                                    <a type="button" href="{{ $x->fotopelamar }}" download class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Download File">
                                        <i>Doownload Foto</i>
                                    </a>

                                </center> @endif

                                @if (auth()->user()->level == 'Admin'||
                                auth()->User()->level == 'Peminjam' )
                                <center><a href="/editdatapelamar/{{$x->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                    <a href="/deletedatapelamar/{{$x->id}}" onclick="return confirm('Apa anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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