<?php

namespace App\Http\Livewire\MailTemplate;

use App\Models\MailTemplate;
use Livewire\Component;
use Livewire\WithPagination;

class ListMailTemplate extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $reload = false;

    public function deleteTemplate($id)
    {
        MailTemplate::find($id)->delete();

        $this->reload = true;

        session()->flash('success', 'Mail template deleted with success!');
    }

    public function render()
    {
        return view('livewire.mail-template.list-mail-template', [
            'allTemplates' => MailTemplate::paginate(10)
        ]);
    }
}