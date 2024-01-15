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
            return redirect()->back()->with('alert', 'You must be logged in to create a siswa.');
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
}
