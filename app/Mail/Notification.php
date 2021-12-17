<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data.
     *
     * @var array
     */
    public $filename;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename = explode(",",$filename);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $files = $this->filename;

        $message = $this->view('notification');    
        $message->subject('Credenciamento feito via Email');

        foreach ($files as $file) { 
            $message->attach($file) ;
        } 
        
        
        return $message; 
 
    }

}