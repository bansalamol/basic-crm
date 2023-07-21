<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login');
  }

  /**
   * Handle account login request
   * @param LoginRequest $request
   * @return \Illuminate\Http\Response
   */
  public function doLogin(LoginRequest $request)
  {
    $credentials = $request->getCredentials();
    if (!Auth::validate($credentials)) :
      return redirect()->to('web/login')
        ->withErrors(trans('auth.failed'));
    endif;
    $user = Auth::getProvider()->retrieveByCredentials($credentials);
    Auth::login($user);
    return $this->authenticated($request, $user);
  }

  /**
   * Handle response after user authenticated
   * @param Request $request
   * @param Auth $user
   * @return \Illuminate\Http\Response
   */
  protected function authenticated(Request $request, $user)
  {
    return redirect()->intended();
  }

  public function doLogout()
  {
    Session::flush();
    Auth::logout();
    return redirect('/web/login');
  }
}
