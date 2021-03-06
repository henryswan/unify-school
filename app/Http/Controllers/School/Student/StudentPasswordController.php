<?php
/**
 * Created by PhpStorm.
 * User: Ak
 * Date: 3/14/2015
 * Time: 6:30 PM
 */

namespace UnifySchool\Http\Controllers\School\Student;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use UnifySchool\Http\Controllers\Controller;

class StudentPasswordController extends Controller
{

    /*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\PasswordBroker $passwords
     */
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;

        $this->middleware('guest.student');
    }
}