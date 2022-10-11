<?php


namespace App\Http\Controllers;


use App\Lib\TemplateParser;
use App\Mail\SendMail;
use App\Models\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email',
           'content' => 'required'
        ]);

        $mailTemplate = MailTemplate::where('template_key', 'contact-us')->first();

        if(!$mailTemplate) {
            session()->flash('error', 'Make sure that the required email template exist and try again');
            return redirect()->back();
        }

        $siteAdmin = env("MAIL_FROM_ADDRESS");

        $templateParser = (new TemplateParser($mailTemplate->body));
        $templateParser->process();

        Mail::to($siteAdmin)->send(new SendMail($mailTemplate->subject, $templateParser->getCompiled()));

        session()->flash('success', 'Message is being sent');

        return redirect()->back();
    }

    public function sendWelcomeEmail()
    {
        $mailTemplate = MailTemplate::where('template_key', 'welcome-email')->first();

        $templateParser = (new TemplateParser($mailTemplate->body));
        $templateParser->username = auth()->user()->name;
        $templateParser->email = auth()->user()->email;
        $templateParser->process();

        Mail::to(auth()->user()->email)->send(new SendMail($mailTemplate->subject, $templateParser->getCompiled()));
    }

    /**
     * using raw [MESSAGE_BODY]
     */
    public function sendInvitation()
    {
        $mailTemplate = MailTemplate::where('template_key', 'invitation-request')->first();

        $rawMessage = "<strong>Dear user,</strong><p>We would like to invite to join our platform, click on the below to proceed </p>
                        <a href='#'>http://demo.example.com/invitation-accept</a>
     ";

        $templateParser = (new TemplateParser($mailTemplate->body, $rawMessage));

        $templateParser->process();

        Mail::to(auth()->user()->email)->send(new SendMail($mailTemplate->subject, $templateParser->getCompiled()));
    }
}