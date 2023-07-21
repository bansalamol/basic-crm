<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class Register extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register');
  }

  /**
   * Handle account registration request
   * @param RegisterRequest $request
   * @return \Illuminate\Http\Response
   */
  public function register(RegisterRequest $request)
  {
    $user = User::create($request->validated());
    auth()->login($user);
    return redirect('/')->with('success', "Account successfully registered.");
  }
}
