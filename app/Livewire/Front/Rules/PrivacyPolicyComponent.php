<?php

namespace App\Livewire\Front\Rules;

use App\Models\Rules\PrivacyPolicy;
use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        $privacy = PrivacyPolicy::where('status', 'active')->first();
        return view('livewire.front.rules.privacy-policy-component', compact(
            'privacy',
        ));
    }
}
