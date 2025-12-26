<?php

namespace App\Livewire\Back\Rules\Terms;

use App\Models\Rules\TermsPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditTermsPolicyComponent extends Component
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
    public $status;
    public $id;

    public function mount($slug)
    {
        $this->slug = $slug;
        $terms = TermsPolicy::where('slug', $slug)->first();
        $this->title_ge = $terms->translateOrNew('ge')->title;
        $this->title_az = $terms->translateOrNew('az')->title;
        $this->title_en = $terms->translateOrNew('en')->title;
        $this->description_ge = $terms->translateOrNew('ge')->description;
        $this->description_az = $terms->translateOrNew('az')->description;
        $this->description_en = $terms->translateOrNew('en')->description;
        $this->id = $terms->id;
        $this->user_id = $terms->user_id;
        $this->slug = $terms->slug;
        $this->status = $terms->status;

    }

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
            'slug' => 'required|string',
        ]);
    }

    public function update()
    {
        $this->validate([
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'description_ge' => 'required|string',
            'description_az' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string',
        ]);

        $terms = TermsPolicy::find($this->id);
        $terms->translateOrNew('ge')->title = $this->title_ge;
        $terms->translateOrNew('az')->title = $this->title_az;
        $terms->translateOrNew('en')->title = $this->title_en;
        $terms->translateOrNew('ge')->description = $this->description_ge;
        $terms->translateOrNew('az')->description = $this->description_az;
        $terms->translateOrNew('en')->description = $this->description_en;
        $terms->user_id = Auth::id();
        $terms->slug = $this->slug;
        $terms->status = $this->status;
        $terms->save();
        session()->flash('success', 'Updated');
        return redirect()->route('back.terms');
    }

    public function render()
    {
        return view('livewire.back.rules.terms.edit-terms-policy-component');
    }
}
