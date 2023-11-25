<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\datapelamar;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDataPelamar extends Controller
{

    public function viewdatapelamar()
    {
        $data = datapelamar::all();
        return view('datapelamar.viewdatapelamar', ['data' => $data]);
    }
    public function inputdatapelamar()
    {
        return view('datapelamar.inputdatapelamar');
    }

    public function savedatapelamar(Request $x)
    {
        //Validasi
        $messages = [
            'nik.required' => 'nik tidak boleh kosong!',
            'nama.required' => 'nama tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'alamat.required' => 'alamat tidak boleh kosong!',
            'agama.required' => 'agama tidak boleh kosong!',
            'jenisk.required' => 'jenisk tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenisk' => 'required',
            'fotopelamar' => 'required', 'fotopelamar|image|mimes:jpeg,png,jpg|max:2048', 'Masukan Foto'
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('fotopelamar');
        if (empty($file)) {
            datapelamar::create([
                'nik' => $x->nik,
                'nama' => $x->nama,
                'email' => $x->email,
                'alamat' => $x->alamat,
                'agama' => $x->agama,
                'jenisk' => $x->jenisk,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            datapelamar::create([
                'nik' => $x->nik,
                'nama' => $x->nama,
                'email' => $x->email,
                'alamat' => $x->alamat,
                'agama' => $x->agama,
                'jenisk' => $x->jenisk,
                'fotopelamar' => $pathPublic,
            ]);
        }
        Alert::success('Berhasil Menambah datapelamar');
        return redirect('/viewdatapelamar')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data datapelamar
    public function editdatapelamar($iddatapelamar)
    {
        $datadatapelamar = datapelamar::find($iddatapelamar);
        return view("datapelamar.editdatapelamar", ['data' => $datadatapelamar]);
    }

    //Update data datapelamar
    public function updatedatapelamar($id, Request $x)
    {
        //Validasi
        $messages = [
            'nik.required' => 'nik tidak boleh kosong!',
            'nama.required' => 'nama tidak boleh kosong!',
            'email.required' => 'email tidak boleh kosong!',
            'alamat.required' => 'alamat tidak boleh kosong!',
            'agama.required' => 'agama tidak boleh kosong!',
            'jenisk.required' => 'jenisk tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenisk' => 'required',
            'fotopelamar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        $file = $x->file('fotopelamar');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = datapelamar::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        datapelamar::where("id", "$id")->update([
            'nik' => $x->nik,
            'nama' => $x->nama,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'agama' => $x->agama,
            'jenisk' => $x->jenisk,
            'fotopelamar' => $path,
        ]);
        Alert::success('Berasil Mengubah datapelamar');
        return redirect('/viewdatapelamar')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus datapelamar
    public function deletedatapelamar($id)
    {
        try {
            $data = datapelamar::where('id', $id)->first();
            File::delete($data->file);
            datapelamar::where('id', $id)->delete();
            Alert::success('Berasil Menghapus datapelamar');
            return redirect('/viewdatapelamar')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewdatapelamar')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
