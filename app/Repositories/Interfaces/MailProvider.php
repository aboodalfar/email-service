<?php

interface MailProvider {
    public function sendSms($mobileNo,$msg);
}
