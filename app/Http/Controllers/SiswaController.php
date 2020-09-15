<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use App\Telepon;
use App\Hobi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $halaman = 'siswa';
      $siswa_list = Siswa::orderBy('created_at', 'desc')->paginate(2);
      $jumlah_siswa = Siswa::count();
      return view('siswa.index', compact('halaman', 'siswa_list', 'jumlah_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $list_kelas = Kelas::all();
      $jumlah_kelas = Kelas::count();
      $list_hobi = Hobi::all();
      $jumlah_hobi = Hobi::count();
      return view('siswa.create', compact('list_kelas', 'jumlah_kelas', 'list_hobi', 'jumlah_hobi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request;
      $input = $request->all();
      
      $this->validate($request, [
        'nisn' => 'required|string|size:4|unique:siswa,nisn',
        'nama_siswa' => 'required|string|max:30',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'nomor_telepon' => 'nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
        'id_kelas' => 'required'
      ]);

      $siswa = Siswa::create($input);

      $telepon = new Telepon;
      if($request->nomor_telepon) {      
        $telepon->nomor_telepon = $request->nomor_telepon;
        $siswa->telepon()->save($telepon);
      } else {
        $telepon->nomor_telepon = "-";
        $siswa->telepon()->save($telepon);
      }

      $siswa->hobi()->attach($request->hobi);

      return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $halaman = 'siswa';
      $siswa = Siswa::findOrFail($id);
      return view('siswa.show', compact('halaman', 'siswa'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $siswa = Siswa::findOrFail($id);
      $list_kelas = Kelas::all();
      $jumlah_kelas = Kelas::count();
      $list_hobi = Hobi::all();
      $jumlah_hobi = Hobi::count();
      // $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
      return view('siswa.edit', compact('siswa', 'list_kelas', 'jumlah_kelas', 'list_hobi', 'jumlah_hobi'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
      $siswa = Siswa::findOrFail($id);
      $input = $request->all();
      
      $this->validate($request, [
        'nisn' => 'required|string|size:4|unique:siswa,nisn,' . $id,
        'nama_siswa' => 'required|string|max:30',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'nomor_telepon' => 'nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $id . ',id_siswa',
        'id_kelas' => 'required'
      ]);

      $siswa->update($request->all());

      $telepon = $siswa->telepon;
      $telepon->nomor_telepon = $request->nomor_telepon;
      $siswa->telepon()->save($telepon);

      $siswa->hobi()->sync($request->hobi);
      return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $siswa = Siswa::findOrFail($id);
      $siswa->delete();
      return redirect('siswa');      
    }
}
