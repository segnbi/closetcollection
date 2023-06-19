<?php

namespace App\Http\Controllers\Auth\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminAuthenticatedSessionController extends Controller
{
  public function create(Request $request)
  {
    return Inertia::render('Admin/Auth/Login');
  }

  public function store(Request $request)
  {
    if (Auth::guard('admin')->attempt($request->all())) {
      $request->session()->regenerate();
      return redirect()->route('admin.dashboard');
    }

    return redirect('/');
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request): RedirectResponse
  {
    Auth::guard('admin')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
