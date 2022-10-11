<?php

namespace App\Http\Livewire\MailTemplate;

use App\Models\MailTemplate;
use App\Models\MailVariable;
use Livewire\Component;

class EditMailTemplate extends Component
{
    use MailTemplateFormTrait;

    public $title = "";
    public $subject = "";
    public $body = "";
    public $templateKey = "";

    public $itemId;

    protected $listeners = ["setBody"];

    public function mount($id)
    {
        $mailTemplate = MailTemplate::find($id);

        $this->fill([
            'itemId' => $id,
            'title' => $mailTemplate->title,
            'subject' => $mailTemplate->subject,
            'body' => $mailTemplate->body,
            'templateKey' => $mailTemplate->template_key
        ]);
    }

    public function render()
    {
        return view('livewire.mail-template.create-mail-template', [
            'mailVariables' => MailVariable::all()
        ]);
    }
}