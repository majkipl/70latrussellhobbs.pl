<?php

namespace App\Services;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendMail(array $data): void
    {
        Mail::to(env('APP_CONTACT_MAIL'))->send(new ContactMail($data));
    }
}
