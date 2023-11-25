@extends('thema')

@section('konten')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Data Pelamar Masuk</h4>
                <p class="card-description">
                </p>
                <form action="/savedatapelamar" method="POST" class="form-horizontal" files="true"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1">No Hp</label>
                        <input type="text" name="nik" class="form-control" placeholder="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Pelamar</label>
                        <input type="text" name="nama" class="form-control" placeholder="nama"
                            value="{{ old('nama') }}">
                        @error('nama')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email"
                            value="{{ old('email') }}">
                        @error('email')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="alamat"
                            value="{{ old('alamat') }}">
                        @error('alamat')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Posisi</label>
                        <select name="agama" class="form-control @error('agama') is-invalid @enderror"
                            id="exampleSelectGender" value="{{ old('agama') }}">
                            <option value="-">Yang Tersedia</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Office">Office</option>
                            <option value="Waiters">Waiters</option>
                        </select>
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Jenis Kelamin</label>
                        <select name="jenisk" class="form-control @error('jenisk') is-invalid @enderror"
                            id="exampleSelectGender" value="{{ old('jenisk') }}">
                            <option value="-">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenisk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="fotopelamar" id="exampleInputFile" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/viewdatapelamar" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
