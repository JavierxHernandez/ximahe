<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{
    use WithFileUploads;

    public Company $company;
    public $image;
    public $showDeleteModal = false;


    protected function rules()
    {
        return [
            'company.name' => ['required'],
            'image' => [
                Rule::requiredIf(! $this->company->image),
                Rule::when($this->image, ['image', 'max:2048'])
            ],
            'company.description' => ['required']
        ];
    }

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.company-form');
    }

    // CRUD

    public function submit()
    {
        $this->validate();

        if ($this->image) {
            $this->company->image = $this->uploadImage();
        }
        $this->company->save();

        session()->flash('status', __('Company saved'));

        return $this->redirectRoute('companies.index');
    }

    // IMAGES

    public function uploadImage()
    {
        if ($oldImage = $this->company->image) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->image->store('/images/companies/', 'public');
    }

}
