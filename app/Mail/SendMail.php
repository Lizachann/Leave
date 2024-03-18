<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data )
    {
        $this->data =$data;
    }


    public function build()
    {
        return $this->from('testlaravelterm4@gmail.com', 'AFTAC Leave Application')
            ->subject($this->data['subject'])
            ->view('emails.index')
            ->with('data', $this->data);
    }
}
