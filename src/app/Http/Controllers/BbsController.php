<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bbs;

class BbsController extends Controller
{
  // Indexページの表示
  public function index()
  {
    $bbs = Bbs::all(); // 全データを取りだす
    return view('bbs.index', ["bbs" => $bbs]);
  }

  // 変数をビューへ渡す
  public function create(Request $request)
  {
    // バリデーションチェック
    $request->validate([
      'name' => 'required|max:10',
      'comment' => 'required|max:280',
      'color' => 'required',
    ]);

    $name = $request->input('name');
    $mail = $request->input('mail');
    $comment = $request->input('comment');
    $color = $request->input('color');

    Bbs::insert([
      "name" => $name,
      "mail" => $mail,
      "comment" => $comment,
      "color" => $color,
    ]);

    $bbs = Bbs::all();
    return view('bbs.index', ["bbs" => $bbs]);
  }
}
