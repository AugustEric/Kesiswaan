<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'siswas' => Siswa::all()
        ]);
    }

    public function simpan(Request $req)
    {

        $simpan = new Siswa();
        $simpan->nama = $req->nama;
        $simpan->kelas = $req->kelas;
        $simpan->jurusan = $req->jurusan;
        $simpan->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return redirect()->route('home');
    }
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('home.edit', compact('siswa'));
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->save();

        return redirect()->route('home');
    }
}
