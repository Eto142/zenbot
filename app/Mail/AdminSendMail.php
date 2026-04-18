<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $bodyMessage;

    public function __construct($subjectLine, $bodyMessage)
    {
        $this->subjectLine = $subjectLine;
        $this->bodyMessage = $bodyMessage;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
                    ->view('emails.admin-send')
                    ->withSwiftMessage(function ($message) {
                        $message->getHeaders()
                            ->addTextHeader('List-Unsubscribe', '<' . url('/contact') . '>');
                        $message->getHeaders()
                            ->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
                        $message->getHeaders()
                            ->addTextHeader('Precedence', 'bulk');
                    })
                    ->with([
                        'bodyMessage' => $this->bodyMessage
                    ]);
    }
}
