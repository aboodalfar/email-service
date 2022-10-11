<?php

namespace App\Http\Livewire\MailTemplate;

use App\Models\MailVariable;
use Livewire\Component;

class CreateMailTemplate extends Component
{
    use MailTemplateFormTrait;

    public $title = "";
    public $subject = "";
    public $body = "";
    public $templateKey = "";

    protected $listeners = ["setBody"];

    public function render()
    {
        return view('livewire.mail-template.create-mail-template', [
            'mailVariables' => MailVariable::all()
        ]);
    }
}