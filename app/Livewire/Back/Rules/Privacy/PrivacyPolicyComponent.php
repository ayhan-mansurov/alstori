<?php

namespace App\Livewire\Back\Rules\Privacy;

use App\Models\Rules\PrivacyPolicy;
use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function delete($id)
    {
        $privacy = PrivacyPolicy::find($id);
        $privacy->delete();
        session()->flash('success', 'Deleted');
    }

    public function render()
    {
        $privacy = PrivacyPolicy::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.back.rules.privacy.privacy-policy-component', [
            'privacy' => $privacy,
        ]);
    }
}
