<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TenantVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Owner_Email, $Receiver_Email, $Sender_Name, $Receiver_Name)
    {
        //
        $this->Owner_Email = $Owner_Email;
        $this->Receiver_Email = $Receiver_Email;
        $this->Sender_Name = $Sender_Name;
        $this->Receiver_Name = $Receiver_Name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 
            $this->from('hanapbahayapp@gmail.com', 'HanapBahay App')
            ->markdown('emails.tenant-registration')
            ->with([
                'Receiver_Email' => $this->Receiver_Email,
                'Receiver_Name' => $this->Receiver_Name,
                'Owner_Email' => $this->Owner_Email,
                'Sender_Name' => $this->Sender_Name
            ]);
    }
}
