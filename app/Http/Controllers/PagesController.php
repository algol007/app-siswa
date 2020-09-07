<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  /**
   * Halaman homepage
   */
  public function home()
  {
    return view('pages.index');
  }

  /**
   * Halaman about
   */
  public function about()
  {
    $halaman = 'about';
    return view('pages.about', compact('halaman'));
  }

}
