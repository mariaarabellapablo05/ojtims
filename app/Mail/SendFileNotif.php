<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendFileNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $attachmentPath;
    public $file;
    
    /**
     * Create a new message instance.
     *
     * @param string $attachmentPath The path to the attachment file.
     * @param string $file The file name or identifier.
     */
    public function __construct($attachmentPath, $file)
    {
        $this->attachmentPath = $attachmentPath;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send File Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            
                view: 'mail.sendFile',
                with:['attachmentPath'=>$this->attachmentPath,
            
                'file' => $this->file,],
        
        );
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
