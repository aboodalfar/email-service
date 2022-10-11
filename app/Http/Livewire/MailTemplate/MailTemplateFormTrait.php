<?php
namespace App\Http\Livewire\MailTemplate;

use App\Models\MailTemplate;

trait MailTemplateFormTrait
{
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'title' => 'required',
            'subject' => 'required',
            'templateKey' => 'required|unique:mail_templates,template_key' . (isset($this->itemId) ? ',' . $this->itemId : ''),
            'body' => 'required|min:20'
        ];

    }

    public function setBody($data)
    {
        $this->body = $data;
    }

    public function submit()
    {
        $this->validate();

        if(isset($this->itemId) && $this->itemId) {
            $mailTemplate = MailTemplate::find($this->itemId);
        } else {
            $mailTemplate = new MailTemplate();
        }

        $mailTemplate->title = $this->title;
        $mailTemplate->subject = $this->subject;
        $mailTemplate->body = $this->body;
        $mailTemplate->template_key = $this->templateKey;
        $mailTemplate->save();

        if(isset($this->itemId) && $this->itemId) {
            session()->flash('success', 'Mail template updated with success!');
        } else {
            session()->flash('success', 'Mail template created with success!');
        }

        return redirect()->to('/mail-template');
    }
}