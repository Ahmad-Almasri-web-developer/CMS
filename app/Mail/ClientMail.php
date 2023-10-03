<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $title;
    public $description;

    public function __construct($name,$title,$description)
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
    }

    public function build()
    {
        return $this->view('emails.ms')
            ->subject('Confirmation: Message')
            ->with('name', $this->name)
            ->with('title', $this->title)
            ->with('description', $this->description);
    }
   
}
