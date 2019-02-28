<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $images = Image::all();
    return view('home', ["images" => $images]);
  }

  /**
   * Process the file upload.
   */
  public function upload(Request $request)
  {
    $this->validate($request, [
      'file' => [
        'required',
        'file',
        'image',
        'mimes:jpeg,png',
      ]
    ]);

    if ($request->file('file')->isValid([])) {
      $path = $request->file->store('public');
      Image::insert(["filename" => basename($path)]);
      $images = Image::all();
      return view('home', ["images" => $images]);
    } else {
      return redirect()
        ->back()
        ->withInput()
        ->withErrors('error');
    }
  }
}
