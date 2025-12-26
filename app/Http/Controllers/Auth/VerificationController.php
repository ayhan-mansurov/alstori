<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function notice()
    {
        return view('auth.verify-email');

    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        if(Auth::user()->utype === 'ADM')
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->route('user.myaccount');
        }
    }

    public function notification(Request $request)
    {
        if(Auth::user()->email_verified_at === null)
        {
            $request->user()->sendEmailVerificationNotification();
        }
        else
        {
            return back()->with('status', 'Verification link not sent!');
        }

        return back()->with('status', 'Verification link sent!');
    }
}
