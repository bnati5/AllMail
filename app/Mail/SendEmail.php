<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('testemail')->subject($this->details['subject'])->with("details",$this->details);
        if(!empty($this->details['attachments'])){
            foreach($this->details['attachments'] as $data){
                $email->attachData(base64_decode($data['base64']), $data['filename']);
            }
        }

        return $email;
    }
}
