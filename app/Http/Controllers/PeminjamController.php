<?php

namespace App\Http\Controllers;

use App\Models\JenisPeminjam;
use App\Models\Peminjam;
use App\Models\Telepon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamController extends Controller
{
    function index(Request $request)
    {
        $maxItem = 25;
        $peminjams = null;
        if ($request->has('q') && $request->filled('q')) {
            $query = $request->get('q');
            $peminjams = Peminjam::where('kode_peminjam', 'LIKE', "%$query%")
                ->orWhere('nama_peminjam', 'LIKE', "%$query%")
                ->orWhere('tgl_lahir', 'LIKE', "%$query%")
                ->orWhere('alamat', 'LIKE', "%$query%")
                ->paginate();
        } else {
            $peminjams = Peminjam::paginate($maxItem);
        }

        return view('peminjams.index', ['peminjams' => $peminjams]);
    }

    function add()
    {
        $jenis = JenisPeminjam::all();
        return view('peminjams.tambah', ['jenis' => $jenis]);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'nama' => 'required|string|max:40',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
            'tanggal' => 'required|date',
            'alamat' => 'required|string',
            'jenis' => 'required|numeric',
            'telepon' => 'required|numeric'
        ]);

        $foto = $request->file('foto');
        $photoId = md5_file($foto->getRealPath());
        Storage::putFileAs('photo', $foto, $photoId);

        $peminjam = new Peminjam([
            'kode_peminjam' => $request->post('kode'),
            'nama_peminjam' => $request->post('nama'),
            'foto_peminjam' => $photoId,
            'tgl_lahir' => $request->post('tanggal'),
            'alamat' => $request->post('alamat'),
            'jenis_id' => $request->post('jenis'),
        ]);
        $peminjam->save();
        $peminjam->refresh();
        $telepon = new Telepon([
            'id_peminjam' => $peminjam->id,
            'nomor_telepon' => $request->post('telepon'),
        ]);
        $telepon->save();
        return redirect('/peminjam')->with('alert', 'success')
            ->with('message', 'Berhasil menambahkan peminjam');
    }

    function edit($id)
    {
        $peminjam = Peminjam::find($id);
        $jenis = JenisPeminjam::all();
        if (!$peminjam) return redirect('/peminjam');
        return view('peminjams.edit', ['peminjam' => $peminjam, 'jenis' => $jenis]);
    }

    function update(Request $request, $id)
    {
        $peminjam = Peminjam::find($id);
        if (!$peminjam) return redirect('/peminjam');
        $peminjam->kode_peminjam = $request->post('kode');
        $peminjam->nama_peminjam = $request->post('nama');
        $peminjam->tgl_lahir = $request->post('tanggal');
        $peminjam->alamat = $request->post('alamat');
        $peminjam->jenis_id = $request->post('jenis');
        $peminjam->telepon->nomor_telepon = $request->post('telepon');
        $peminjam->telepon->save();
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $photoId = md5_file($foto->getRealPath());
            Storage::delete('photo/' . $peminjam->foto_peminjam);
            Storage::putFileAs('photo', $foto, $photoId);
            $peminjam->foto_peminjam = $photoId;
        }
        $peminjam->save();

        return redirect('/peminjam')->with('alert', 'success')
            ->with('message', 'Berhasil merubah peminjam');
    }

    function delete($id)
    {
        $peminjam = Peminjam::find($id);
        if (!$peminjam) return redirect('/peminjam');
        $peminjam->delete();

        return redirect('/peminjam')->with('alert', 'success')
            ->with('message', 'Berhasil menghapus peminjam');
    }

    function lihat_foto($id)
    {
        $foto = Storage::get("photo/$id");
        return response($foto, 200, ['Content-Type' => 'image/png;image/jpg']);
    }
}
