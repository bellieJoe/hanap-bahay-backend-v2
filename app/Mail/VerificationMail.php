<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $fullname)
    {
        //
        $this->code = $code;
        $this->fullname = $fullname;
        // $this->emai_address = $email_address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hanapbahayapp@gmail.com', 'HanapBahay App')
                    ->markdown('emails.verification-code')
                    ->with([
                        'code' => $this->code,
                        'fullname' => $this->fullname
                    ]);
    }
}
