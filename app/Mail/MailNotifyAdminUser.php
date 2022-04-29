<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotifyAdminUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $adminUser;
    protected $urlConfirm;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminUser, $urlConfirm)
    {
        $this->adminUser = $adminUser;
        $this->urlConfirm = $urlConfirm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('admin.emails.notify_admin_user', [
                'adminUser' => $this->adminUser,
                'urlConfirm' => $this->urlConfirm,
            ])
            ->subject(__('email.notify_admin_user.subject'));
    }
}
