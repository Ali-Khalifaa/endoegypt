<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registration extends Mailable
{
    public $data,$pdf_file,$mail,$name;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$pdf_file,$mail)
    {
        $this->mail = $mail;
        $this->name = $name;
        $this->pdf_file = $pdf_file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome Message')
        ->markdown('registration',['name' => $this->name,'mail' => $this->mail])->attach($this->pdf_file, ['mime' => 'application/pdf']);;
    }
}
