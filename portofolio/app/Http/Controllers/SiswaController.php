<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function home(){
        return view('homepage');
    }

    public function portfolioList(){
        return view('portfolioList');
    }

    public function index()
    {
        $siswa = Siswa::all();
        return view('siswaIndex', compact('siswa'));
    }

    public function createPage(){
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
        ]);

        $siswa = new Siswa();

        if (!auth()->check()) {
            // Redirect the user to the form page with a flash message and JavaScript alert
            session()->flash('error', 'You must be logged in to create a siswa.');
            return redirect()->back()->with('unauthorized', 'You must be logged in to create a siswa.');
        }

        $siswa->user = auth()->user()->username; // save the username of the authenticated user

        $siswa->nama = $request->input('nama');
        $siswa->no_telp = $request->input('no_telp');
        $siswa->alamat = $request->input('alamat');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        $siswa->tempat_lahir = $request->input('tempat_lahir');
        $siswa->save();

        return redirect('/crud')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Mengambil data siswa berdasarkan ID
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return abort(404); // Menghasilkan halaman 404 jika data tidak ditemukan
        }

        // Menampilkan halaman pengeditan siswa (misalnya, siswa_update.blade.php) dengan data siswa
        return view('siswaEdit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
    
        $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
    
        // Check if the authenticated user is the same user who added the data
        $isAuthorized = auth()->check() && auth()->user()->username === $siswa->user;
    
        if (!$isAuthorized) {
            // Set as session variable to indicate the unauthorized status
            session()->flash('unauthorized', true);
            return redirect()->route('siswa.index')->with('unauthorized', 'you are not authorized to edit this record');
        }
    
        // Simpan perubahan data siswa
        $siswa->nama = $request->nama;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->no_telp = $request->no_telp;
        $siswa->alamat = $request->alamat;
    
        $siswa->save();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Check if the authenticated user is the same user who added the data
        $isAuthorized = auth()->check() && auth()->user()->username === $siswa->user;

        if (!$isAuthorized) {
            // Set as session variable to indicate the unauthorized status
            session()->flash('unauthorized', true);
            return redirect()->back()->with('unauthorized', 'you are not authorized to delete this record');
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}