<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;

    public function __construct(string $message) // تأكد من أن المتغير هو من نوع string
    {
        $this->message = $message;
    }
    public function build()
    {
        return $this->subject('Test Email')
                    ->view('emaills.test')
                    ->with(['message' => $this->message]); // تأكد من أن $this->message هو نص
    }
    
    
}
