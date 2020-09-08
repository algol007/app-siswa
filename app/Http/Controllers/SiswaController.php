<?php

namespace App\Http\Controllers;

use App\Siswa;
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
      return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();
      
      $validator = Validator::make($input, [
        'nisn' => 'required|string|size:4|unique:siswa,nisn',
        'nama_siswa' => 'required|string|max:30',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P'
      ]);

      if($validator->fails()) {
        return redirect('siswa/create')
                ->withInput()
                ->withErrors($validator);
      }

      Siswa::create($input);

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
      return view('siswa.edit', compact('siswa'));      
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
      
      $validator = Validator::make($input, [
        'nisn' => 'required|string|size:4|unique:siswa,nisn,' . $id,
        'nama_siswa' => 'required|string|max:30',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P'
      ]);

      if($validator->fails()) {
        return redirect('siswa/'. $id . '/edit')
                ->withInput()
                ->withErrors($validator);
      }

      $siswa->update($request->all());

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
