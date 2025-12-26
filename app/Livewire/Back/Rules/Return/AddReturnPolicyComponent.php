<?php

namespace App\Livewire\Back\Rules\Return;

use App\Models\Rules\ReturnPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class AddReturnPolicyComponent extends Component
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
            'slug' => 'required|string|unique:return_policies,slug',
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
            'slug' => 'required|string|unique:return_policies,slug',
            'status' => 'nullable|string|in:active,inactive',
        ]);

        $return = new ReturnPolicy();
        $return->translateOrNew('ge')->title = $this->title_ge;
        $return->translateOrNew('az')->title = $this->title_az;
        $return->translateOrNew('en')->title = $this->title_en;
        $return->translateOrNew('ge')->description = $this->description_ge;
        $return->translateOrNew('az')->description = $this->description_az;
        $return->translateOrNew('en')->description = $this->description_en;
        $return->slug = $this->slug;
        $return->status = $this->status;
        $return->user_id = Auth::id();
        $return->save();
        session()->flash('success', 'Added');
        return redirect()->route('back.return');
    }

    public function render()
    {
        return view('livewire.back.rules.return.add-return-policy-component');
    }
}
