<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamMemberAssessmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $linkValues;
    public $behaviorValues;
    public $memberId;

    public function __construct($linkValues, $behaviorValues, $memberId)
    {
        $this->linkValues = $linkValues;
        $this->behaviorValues = $behaviorValues;
        $this->memberId = $memberId;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Assessment Invitation')
            ->view('emails.team_member_assessment');
    }
}

