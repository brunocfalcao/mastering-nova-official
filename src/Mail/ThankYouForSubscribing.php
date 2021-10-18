<?php

namespace Eduka\MasteringNova\Mail;

use Eduka\Abstracts\EdukaMailable;

class ThankYouForSubscribing extends EdukaMailable
{
    public function build()
    {
        $this->targetView = 'site::mail.thank-you-for-subscribing';
        parent::build();
    }
}
