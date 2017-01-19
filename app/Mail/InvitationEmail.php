<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Meeting;

class InvitationEmail extends Mailable
{

    public $id_meeting;
    public $mail_participant;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_meeting, $mail_participant)
    {
        $this->id_meeting = $id_meeting; 
        $this->mail_participant = $mail_participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $meeting = Meeting::findOrFail($this->id_meeting);

        $organisateur = User::find($meeting->user_id);

        $mail_participant = $this->mail_participant;



        return $this->view('email.invite', compact('meeting', 'organisateur', 'mail_participant'));
    }
}
