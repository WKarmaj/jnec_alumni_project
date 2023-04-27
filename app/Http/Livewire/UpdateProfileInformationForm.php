<?php
namespace App\Http\Livewire;

use Livewire\Component;

class UpdateProfileInformationForm extends Component
{
    public $state;
    public $showEmploymentFields = false;

    protected $rules = [
        'state.name' => ['required', 'string', 'max:255'],
        'state.email' => ['required', 'email', 'max:255'],
        'state.employment_status' => ['required', 'string'],
        'state.organization' => ['nullable', 'string', 'max:255'],
        'state.position' => ['nullable', 'string', 'max:255'],
    ];

    public function mount()
    {
        $this->state = auth()->user()->withoutRelations()->toArray();
    }

    public function updateProfileInformation()
    {
        $this->validate();

        auth()->user()->update([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'employment_status' => $this->state['employment_status'],
            'organization' => $this->state['organization'],
            'position' => $this->state['position'],
        ]);

        session()->flash('success', __('Profile information has been updated.'));
    }

    public function render()
    {
        return view('livewire.update-profile-information-form');
    }
}

