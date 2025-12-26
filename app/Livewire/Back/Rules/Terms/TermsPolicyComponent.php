<?php

namespace App\Livewire\Back\Rules\Terms;

use App\Models\Rules\TermsPolicy;
use Livewire\Component;

class TermsPolicyComponent extends Component
{
    public function delete($id)
    {
        $terms = TermsPolicy::find($id);
        $terms->delete();
        session()->flash('success', 'Deleted');
    }

    public function render()
    {
        $terms = TermsPolicy::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.back.rules.terms.terms-policy-component', [
            'terms' => $terms,
        ]);
    }
}
