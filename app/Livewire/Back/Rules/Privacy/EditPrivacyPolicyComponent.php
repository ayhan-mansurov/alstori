<?php

namespace App\Livewire\Back\Rules\Privacy;

use App\Models\Rules\PrivacyPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditPrivacyPolicyComponent extends Component
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
        $privacy = PrivacyPolicy::where('slug', $slug)->first();
        $this->title_ge = $privacy->translateOrNew('ge')->title;
        $this->title_az = $privacy->translateOrNew('az')->title;
        $this->title_en = $privacy->translateOrNew('en')->title;
        $this->description_ge = $privacy->translateOrNew('ge')->description;
        $this->description_az = $privacy->translateOrNew('az')->description;
        $this->description_en = $privacy->translateOrNew('en')->description;
        $this->id = $privacy->id;
        $this->user_id = $privacy->user_id;
        $this->slug = $privacy->slug;
        $this->status = $privacy->status;

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

        $privacy = PrivacyPolicy::find($this->id);
        $privacy->translateOrNew('ge')->title = $this->title_ge;
        $privacy->translateOrNew('az')->title = $this->title_az;
        $privacy->translateOrNew('en')->title = $this->title_en;
        $privacy->translateOrNew('ge')->description = $this->description_ge;
        $privacy->translateOrNew('az')->description = $this->description_az;
        $privacy->translateOrNew('en')->description = $this->description_en;
        $privacy->user_id = Auth::id();
        $privacy->slug = $this->slug;
        $privacy->status = $this->status;
        $privacy->save();
        session()->flash('success', 'Updated');
        return redirect()->route('back.privacy');
    }

    public function render()
    {
        return view('livewire.back.rules.privacy.edit-privacy-policy-component');
    }
}
