<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSettingsNotifications extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-notifications');
  }
}
