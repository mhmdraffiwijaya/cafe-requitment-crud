@extends('thema_id')

@section('konten')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Acc Daftar Lamaran</h4>
                <p class="card-description">
                </p>
                <form action="/updatedatadaftarpelamar/{{ $data->id }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    {{ csrf_field() }}

                    <input class="form-control" type="hidden" name="id" value="{{ $data->id }}"
                        value="{{ old('id') }}"><br>
                    <div class="form-group">
                        <label for="exampleInputUsername1">No Hp</label>
                        <input class="form-control" type="text" name="nik" value="{{ $data->nik }}"
                            value="{{ old('nik') }}"><br>
                        @error('nik')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Pelamar</label>
                        <input class="form-control" type="text" name="nama" value="{{ $data->nama }}"
                            value="{{ old('nama') }}"><br>
                        @error('nama')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $data->email }}"
                            value="{{ old('email') }}"><br>
                        @error('email')
                            {{ $message }}
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Alamat</label>
                        <input class="form-control" type="text" name="alamat" value="{{ $data->alamat }}"
                            value="{{ old('alamat') }}"><br>
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
                        <input type="file" name="fotodpelamar" id="exampleInputFile" class="form-control">
                        <input type="hidden" name="pathFile" value="{{ $data->fotodpelamar }}">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="{{ $data->fotodpelamar }}">
                            <span class="input-group-append">
                            </span>
                        </div>
                        @error('fotodpelamar')
                            <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <input type="hidden" name="Diterima" class="form-control" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="status" value="Diterima">

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/viewdatadaftarpelamar" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
