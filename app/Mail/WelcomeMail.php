<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'sizin kodiniz tomende, kodti eshkimge aytpan',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail',
            with: $this->data,
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
