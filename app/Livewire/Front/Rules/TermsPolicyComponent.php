<?php

namespace App\Livewire\Front\Rules;

use App\Models\Rules\TermsPolicy;
use Livewire\Component;

class TermsPolicyComponent extends Component
{
    public function render()
    {
        $terms = TermsPolicy::where('status', 'active')->first();
        return view('livewire.front.rules.terms-policy-component', compact(
            'terms',
        ));
    }
}
