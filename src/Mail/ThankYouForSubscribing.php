<?php

namespace Eduka\MasteringNova\Mail;

use Eduka\Abstracts\EdukaMailable;

class ThankYouForSubscribing extends EdukaMailable
{
    public function build()
    {
        $this->targetMarkdown = 'site::mail.thank-you-for-subscribing';
        parent::build();
    }
}
