<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 
     * @var \App\Models\Contact  
     */
    protected $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@admin.com')
                    ->subject($this->contact['subject'])
                    ->markdown('emails.contactEmail')
                    ->with([
                        'name' => $this->contact->name,
                        'message' => $this->contact->message,
                        'email' => $this->contact->email,


        ]);
    }
}
