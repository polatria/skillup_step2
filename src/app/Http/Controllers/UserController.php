<?php
namespace App\Http\Controllers;
use App\User;
class UserController extends Controller {
  public function index() {
    $users = User::all();
    return view('user', ['users' => $users]);
  }

  public function show($id) {
    return view('user.id', ['user' => User::findOrFail($id)]);
  }
}
