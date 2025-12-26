<?php

namespace App\Livewire\Back\Rules\Return;

use App\Models\Rules\ReturnPolicy;
use Livewire\Component;

class ReturnPolicyComponent extends Component
{
    public function delete($id)
    {
        $return = ReturnPolicy::find($id);
        $return->delete();
        session()->flash('success', 'Deleted');
    }

    public function render()
    {
        $return = ReturnPolicy::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.back.rules.return.return-policy-component', [
            'return' => $return,
        ]);
    }
}
