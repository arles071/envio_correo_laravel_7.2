<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(env('MAIL_HOST') != 'smtp.mailtrap.io'){
            $this->from(env('MAIL_USERNAME'));
        }
        $this->to($this->data['email']);
        $this->subject("Correo de prueba");
        $this->view("enviar_correos.email-prueba");

        if( isset($this->data['attach']) ){
            $this->attach($this->data['attach']['route'], [
                'as' => $this->data['attach']['as'],
                'mime' => $this->data['attach']['mime'],
            ]);
        }
        
        /*
        if (isset($this->params->attach)) {
            foreach ($this->params->attach as $value) {
                $this->attach($value['route'], [
                    'as' => $value['as'],
                    'mime' => $value['mime'],
                ]);
            }
        }*/

        return $this;
    }
}
