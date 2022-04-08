<?php

namespace App\Services;
use App\Mail\SendMail;
use App\Services\BaseService;
use Illuminate\Support\Facades\Mail;

class MailService extends BaseService
{
    public function sendMailAddAdmin($data)
    {
        $dataMail = [
            'subject' => 'xacs nhan email',
            'viewFile' => 'mail.verifyAdmin.confirmVerifyAdmin',
            'email' => $data['email'],
            'url' => url(config('app.url')) . '/admin/verify-admin?token=' . $data['verify_token'],
            'url_login' => url(config('app.url')) . '/admin/login',
        ];
        Mail::to($data['email'])->send(new SendMail($dataMail));
    }
}
