<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\datadaftarpelamar;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDataDaftarPelamar extends Controller
{

    public function viewdatadaftarpelamar()
    {
        $data = datadaftarpelamar::all();
        return view('datadaftarpelamar.viewdatadaftarpelamar', ['data' => $data]);
    }
    public function inputdatadaftarpelamar()
    {
        return view('datadaftarpelamar.inputdatadaftarpelamar');
    }

    public function savedatadaftarpelamar(Request $x)
    {
        //Validasi
        $messages = [
            'nik.required' => 'nik tidak boleh kosong!',
            'nama.required' => 'nama tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'alamat.required' => 'alamat tidak boleh kosong!',
            'agama.required' => 'agama tidak boleh kosong!',
            'jenisk.required' => 'jenisk tidak boleh kosong!',
            'status.required' => 'status tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenisk' => 'required',
            'status' => 'required',
            'fotodpelamar' => 'required', 'fotodpelamar|image|mimes:jpeg,png,jpg|max:2048', 'Masukan Foto'
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('fotodpelamar');
        if (empty($file)) {
            datadaftarpelamar::create([
                'nik' => $x->nik,
                'nama' => $x->nama,
                'email' => $x->email,
                'alamat' => $x->alamat,
                'agama' => $x->agama,
                'jenisk' => $x->jenisk,
                'status' => $x->status,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            datadaftarpelamar::create([
                'nik' => $x->nik,
                'nama' => $x->nama,
                'email' => $x->email,
                'alamat' => $x->alamat,
                'agama' => $x->agama,
                'jenisk' => $x->jenisk,
                'status' => $x->status,
                'fotodpelamar' => $pathPublic,
            ]);
        }
        Alert::success('Berhasil Menambah datadaftarpelamar');
        return redirect('/viewdatadaftarpelamar')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data datadaftarpelamar
    public function editdatadaftarpelamar($iddatadaftarpelamar)
    {
        $datadatadaftarpelamar = datadaftarpelamar::find($iddatadaftarpelamar);
        return view("datadaftarpelamar.editdatadaftarpelamar", ['data' => $datadatadaftarpelamar]);
    }

    public function accdatadaftarpelamar($id)
    {
        $data = DB::table('datadaftarpelamar')->where('id', $id)->first();
        return view('datadaftarpelamar.accdatadaftarpelamar', ['data' => $data]);
    }

    public function noaccdatadaftarpelamar($id)
    {
        $data = DB::table('datadaftarpelamar')->where('id', $id)->first();
        return view('datadaftarpelamar.noaccdatadaftarpelamar', ['data' => $data]);
    }

    //Update data datadaftarpelamar
    public function updatedatadaftarpelamar($id, Request $x)
    {
        //Validasi
        $messages = [
            'nik.required' => 'nik tidak boleh kosong!',
            'nama.required' => 'nama tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'alamat.required' => 'alamat tidak boleh kosong!',
            'agama.required' => 'agama tidak boleh kosong!',
            'jenisk.required' => 'jenisk tidak boleh kosong!',
            'status.required' => 'status tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenisk' => 'required',
            'status' => 'required',
            'fotodpelamar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        $file = $x->file('fotodpelamar');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = datadaftarpelamar::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        datadaftarpelamar::where("id", "$id")->update([
            'nik' => $x->nik,
            'nama' => $x->nama,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'agama' => $x->agama,
            'jenisk' => $x->jenisk,
            'status' => $x->status,
            'fotodpelamar' => $path,
        ]);
        Alert::success('Berasil Mengubah datadaftarpelamar');
        return redirect('/viewdatadaftarpelamar')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus datadaftarpelamar
    public function deletedatadaftarpelamar($id)
    {
        try {
            $data = datadaftarpelamar::where('id', $id)->first();
            File::delete($data->file);
            datadaftarpelamar::where('id', $id)->delete();
            Alert::success('Berasil Menghapus datadaftarpelamar');
            return redirect('/viewdatadaftarpelamar')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewdatadaftarpelamar')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
