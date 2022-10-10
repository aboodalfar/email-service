<?php

namespace App;

use Illuminate\Support\Facades\Mail;

/**
 * Description of Mailgun
 *
 * @author abdullah
 */
class Mailgun extends Mail implements MailProvider{
    //put your code here
    public function sendEmail() {
        dd($this->alwaysFrom('dsad'));
    }

}
