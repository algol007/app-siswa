<?php

namespace App\Http\Controllers;

use App\Hobi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $halaman = 'hobi';
      $hobi_list = Hobi::orderBy('created_at', 'desc')->paginate(2);
      $jumlah_hobi = Hobi::count();
      return view('hobi.index', compact('halaman', 'hobi_list', 'jumlah_hobi'))->with('no', 1);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('hobi.create');
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
        'nama_hobi' => 'required|string',
      ]);

      if($validator->fails()) {
        return redirect('hobi/create')
                ->withInput()
                ->withErrors($validator);
      }

      $hobi = Hobi::create($input);

      return redirect('hobi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $halaman = 'hobi';
      $hobi = Hobi::findOrFail($id);
      return view('hobi.show', compact('halaman', 'hobi'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $hobi = Hobi::findOrFail($id);
      return view('hobi.edit', compact('hobi'));      
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
      $hobi = Hobi::findOrFail($id);
      $input = $request->all();
      
      $validator = Validator::make($input, [
        'nama_hobi' => 'required|string|max:30',
      ]);

      if($validator->fails()) {
        return redirect('hobi/'. $id . '/edit')
                ->withInput()
                ->withErrors($validator);
      }

      $hobi->update($request->all());

      return redirect('hobi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hobi = Hobi::findOrFail($id);
      $hobi->delete();
      return redirect('hobi');      
    }
}
