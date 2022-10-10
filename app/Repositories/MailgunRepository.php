<?php

class MailgunRepository implements ISmsProvider 
{
    //INJECT REPOSITORY CLASS TO INTERACT WITH DB
    public function __construct(SmsRepository $smsRepo )
    {
        $this->smsRepo = $smsRepo;    
    }

    //this method will be called from your controller
    public function sendSMS($mobieNo,$msg)
    {
       //API CALL
        $info = $this->sendSMSAPI($mobieNo,$msg);

       //DB CALL
        $this->smsRepo->save( $info );

       // Any file logs
    }

    //this will actually interact with the API
    protected function sendSMSAPI($mobieNo,$msg)
    {
       //API Call to ValueFirst SMS provider
    }

}