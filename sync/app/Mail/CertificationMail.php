<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $eventName;
    public $eventDate;
    public $eventLocation;
    public $formatacao;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct(public array $data)
    {
        $this->eventName = $data['eventName'];
        $this->eventDate = $data['eventDate'];
        $this->eventLocation = $data['eventLocation'];
        $this->name = $data['name'];

        if($data['type'] == 1)
        {
            $this->formatacao = 'mails.confirmation';
            $this->subject = 'Confirmação de Inscrição';
        }
        else if($data['type'] == 2)
        {
            $this->formatacao = 'mails.cancelation';
            $this->subject = 'Cancelamento de Inscrição';
        }
        else if($data['type'] == 3)
        {
            $this->formatacao = 'mails.presence';
            $this->subject = 'Presença registrada';
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content();
    }

    public function build()
    {
        return $this->from('univent@admin.com', 'Univent')
        ->subject($this->subject)
        ->view($this->formatacao)
        ->with([
            'name' => $this->name,
            'eventName' => $this->eventName,
            'eventDate' => $this->eventDate,
            'eventLocation' => $this->eventLocation,
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
