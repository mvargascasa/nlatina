<?php

namespace App\Mail;

use App\Lead;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLead extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    public function build()
    {
        $mensaje = "<br><strong>Nuevo Lead</strong>
        <br> Nombre: ".$this->lead->fname."
        <br> Telef: ".$this->lead->tlf."
        <br> Email: ".$this->lead->email."
        <br> Interes: ".$this->lead->interest."
        <br> Mensaje: ".$this->lead->message."
        <br> Fuente: ".$this->lead->provider."
        ";
        $mifecha = new DateTime();
        $mifecha->modify('-5 hours');
        return $this->subject('Lead: '.$this->lead->fname . $mifecha->format(' ( d-M H:i )'))->html($mensaje);
    }
}
