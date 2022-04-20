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
    public function sendMailNews($news, $adminRequest ,$note)
    {
        $dataMail = [
            'subject' => 'Yêu cầu phê duyệt Bài viết',
            'viewFile' => 'mail.sendMailNews',
            'news' => $news,
            'adminRequest' => $adminRequest,
            'url' => route('news.edit',[$news->id]),
            'note' => $note
        ];
        Mail::to($news->censorsAdmin->email)->send(new SendMail($dataMail));
    }
}
