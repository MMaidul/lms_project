<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {
        $leads = Lead::paginate(10);
        return view('livewire.lead-index', [
            'leads' => $leads,
        ]);
    }

    public function leadDelete($id, FlasherInterface $flasher)
    {
        $lead = Lead::findOrFail($id);
        $lead->Delete();
        $flasher->addSuccess('info', 'Lead Delete');
    }
}
