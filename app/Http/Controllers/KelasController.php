<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $halaman = 'kelas';
      $kelas_list = Kelas::orderBy('created_at', 'desc')->paginate(2);
      $jumlah_kelas = Kelas::count();
      return view('kelas.index', compact('halaman', 'kelas_list', 'jumlah_kelas'))->with('no', 1);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('kelas.create');
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
        'nama_kelas' => 'required|string|max:30',
      ]);

      if($validator->fails()) {
        return redirect('kelas/create')
                ->withInput()
                ->withErrors($validator);
      }

      $kelas = Kelas::create($input);

      return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $halaman = 'kelas';
      $kelas = Kelas::findOrFail($id);
      return view('kelas.show', compact('halaman', 'kelas'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $kelas = Kelas::findOrFail($id);
      return view('kelas.edit', compact('kelas'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kelas = Kelas::findOrFail($id);
      $input = $request->all();
      
      $validator = Validator::make($input, [
        'nama_kelas' => 'required|string|max:30',
      ]);

      if($validator->fails()) {
        return redirect('kelas/'. $id . '/edit')
                ->withInput()
                ->withErrors($validator);
      }

      $kelas->update($request->all());

      return redirect('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
