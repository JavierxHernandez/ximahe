<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{
    use WithFileUploads;

    public Company $company;
    public $image;
    public $defaultImage = 'images/default-placeholder.png';
    public $showDeleteModal = false;


    protected function rules()
    {
        return [
            'company.name' => ['required'],
            'image' => [
                // Rule::requiredIf(! $this->company->image),
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

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $this->company->image = $this->uploadImage();
        }elseif ($this->company->image === null) {
            $this->company->image = $this->defaultImage;
        }


        $this->company->save();

        session()->flash('flash.banner', __('Company saved'));
        session()->flash('flash.bannerStyle', 'success');

        return $this->redirectRoute('companies.index');
    }

    // IMAGES

    public function uploadImage()
    {

        if ($oldImage = $this->company->file) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->image->store('images/companies/', 'public');

    }

}
