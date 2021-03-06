<?php

namespace App\Mail;

use App\Reembolso;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReembolsoCreate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reembolso;
    public $concepto;
    public $importe;
    public function __construct(Reembolso $reembolso)
    {
        $this->reembolso = $reembolso;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.reembolso_creation');
    }
}
