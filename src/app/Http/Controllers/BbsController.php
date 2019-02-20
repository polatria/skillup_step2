<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BbsController extends Controller {
  // Indexの表示
  public function index() {
    return view('bbs.index');
  }

  // 変数をビューへ渡す
  public function create(Request $request) {

    $request->validate([
      'name' => 'required|max:10',
      'comment' => 'required|min:5|max:280',
      'color' => 'required',
    ]);

    $name = $request->input('name');
    $mail = $request->input('mail');
    $comment = $request->input('comment');
    $color = $request->input('color');

    return view('bbs.index')->with([
      "name" => $name,
      "mail" => $mail,
      "comment" => $comment,
      "color" => $color,
    ]);
  }
}
