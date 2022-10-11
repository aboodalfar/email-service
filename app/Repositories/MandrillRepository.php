<?php
namespace App\Repositories;
use App\Repositories\Interfaces\MailProvider;

class MandrillRepository implements MailProvider 
{
    //INJECT REPOSITORY CLASS TO INTERACT WITH DB
    public function __construct(MailRepository $mailRepo )
    {
        $this->mailRepo = $mailRepo;    
    }

    //this method will be called from your controller
    public function sendEmail($mobieNo,$msg)
    {
       //API CALL
        $info = $this->sendEmailAPI();

       //DB CALL
        $this->mailRepo->save( $info );

       // Any file logs
    }

    //this will actually interact with the API
    protected function sendEmailAPI()
    {
         //TODO : implemet api
    }

}