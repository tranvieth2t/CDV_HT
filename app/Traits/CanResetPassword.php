<?php

namespace App\Traits;

use App\Mail\SendMail;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
         $tokenValidDate = Carbon::now()->setTimezone(Session::get('timezone', config('app.timezone')))
                ->addSeconds(config('auth.passwords.users.expire'));
        $dataMail = [
            'subject'  => trans('mail.subject.reset_password_email'),
            'viewFile' => trans('mail.viewFile.reset_password_email'),
            'tokenValidDate' => $tokenValidDate,
            'url'      => url(route('password.reset', [
                'token' => $token,
                'email' => $this->getEmailForPasswordReset()
            ]))
        ];
        Mail::to($this->getEmailForPasswordReset())->send(new SendMail($dataMail));
    }
}
