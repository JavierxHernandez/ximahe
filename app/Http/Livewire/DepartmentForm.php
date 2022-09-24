<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DepartmentForm extends Component
{
    use WithFileUploads;

    public Department $department;
    public $image;
    public $defaultImage = 'images/default-placeholder.png';
    public $showDeleteModal = false;

    protected function rules()
    {
        return [
            'department.name' => ['required'],
            'image' => [
                // Rule::requiredIf(! $this->department->image),
                Rule::when($this->image, ['image', 'max:2048'])
            ],
            'department.description' => ['required'],
            'department.company_id' => [
                'required',
                Rule::exists('companies', 'id')
            ],
        ];
    }

    public function mount(Department $department)
    {
        $this->department = $department;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.department-form', [
            'companies' => Company::pluck('name', 'id')
        ]);
    }

    // CRUD

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $this->department->image = $this->uploadImage();
        }elseif ($this->department->image === null) {
            $this->department->image = $this->defaultImage;
        }

        $this->department->save();

        session()->flash('flash.banner', __('Department saved'));
        session()->flash('flash.bannerStyle', 'success');

        return $this->redirectRoute('departments.index');
    }

     // IMAGES

     public function uploadImage()
     {
        if ($oldImage = $this->department->file) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->image->store('images/departments/', 'public');
     }
}
