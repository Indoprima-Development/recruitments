<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->data['subject'] ?? 'No Reply Indoprima Gemilang';

        // Tentukan view default
        $view = 'emails.sendemail';

        // Jika subject = forget password → ganti view
        if (strtolower($subject) === 'forget password') {
            $view = 'emails.forget';
        }

        return $this->subject($subject)
            ->view($view);
    }
}
