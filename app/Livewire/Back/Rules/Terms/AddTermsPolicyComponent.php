<?php

namespace App\Livewire\Back\Rules\Terms;

use App\Models\Rules\TermsPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class AddTermsPolicyComponent extends Component
{
    public $activeTab = 'EN';
    public $title_ge;
    public $title_az;
    public $title_en;
    public $description_ge;
    public $description_az;
    public $description_en;
    public $slug;
    public $user_id;
    public $status = 'inactive';

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title_en);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'description_ge' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|unique:terms_policies,slug',
            'status' => 'nullable|string|in:active,inactive',
        ]);
    }

    public function store()
    {
        $this->validate([
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'description_ge' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|unique:terms_policies,slug',
            'status' => 'nullable|string|in:active,inactive',
        ]);

        $terms = new TermsPolicy();
        $terms->translateOrNew('ge')->title = $this->title_ge;
        $terms->translateOrNew('az')->title = $this->title_az;
        $terms->translateOrNew('en')->title = $this->title_en;
        $terms->translateOrNew('ge')->description = $this->description_ge;
        $terms->translateOrNew('az')->description = $this->description_az;
        $terms->translateOrNew('en')->description = $this->description_en;
        $terms->slug = $this->slug;
        $terms->status = $this->status;
        $terms->user_id = Auth::id();
        $terms->save();
        session()->flash('success', 'Added');
        return redirect()->route('back.terms');
    }

    public function render()
    {
        return view('livewire.back.rules.terms.add-terms-policy-component');
    }
}
