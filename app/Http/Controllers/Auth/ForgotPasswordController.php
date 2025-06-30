<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset email links
    | and uses a simple trait to include this functionality. You are free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); // Hanya izinkan pengguna yang belum login mengakses ini
    }

    /**
     * Menampilkan formulir untuk meminta tautan reset kata sandi.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.email');
    }
}
