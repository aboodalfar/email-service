<?php

interface ISmsProvider {
    public function sendSms($mobileNo,$msg);
}
