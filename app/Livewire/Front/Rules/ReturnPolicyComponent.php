<?php

namespace App\Livewire\Front\Rules;

use App\Models\Rules\ReturnPolicy;
use Livewire\Component;

class ReturnPolicyComponent extends Component
{
    public function render()
    {
        $return = ReturnPolicy::where('status', 'active')->first();
        return view('livewire.front.rules.return-policy-component', compact(
            'return',
        ));
    }
}
