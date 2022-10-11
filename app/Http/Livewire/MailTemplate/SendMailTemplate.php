<?php

namespace App\Http\Livewire\MailTemplate;

use App\Mail\SendMail;
use App\Models\MailTemplate;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendMailTemplate extends Component
{
    public $showModal = false;

    public $templateId;

    public $email = "";

    protected $listeners = ['showSendModal', 'closeCreateModal'];

    public function submit()
    {
        $mailTemplate = MailTemplate::find($this->templateId);

        Mail::to($this->email)->send(new SendMail($mailTemplate->subject, $mailTemplate->body));

        session()->flash('success', 'Check your inbox for test message');
    }

    public function showSendModal($id)
    {
        $this->showModal = true;

        $this->templateId = $id;
    }

    public function closeCreateModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.mail-template.send-mail-template');
    }
}