<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Document;
use App\Models\DocumentStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentForm extends Component
{
    use WithFileUploads;

    public Document $document;
    public $file;
    public $showDeleteModal = false;

    protected function rules()
    {
        return [
            'document.name' => ['required'],
            'file' => [
                Rule::requiredIf(!$this->document->file),
                Rule::when($this->file, ['mimes:pdf,docx,doc,pptx,ppt,xlsx,xlsm,xlsb,xl|max:2048',]),
            ],
            'document.description' => ['required'],
            'document.department_id' => [
                'required',
                Rule::exists('departments', 'id')
            ],
            'document.document_status_id' => [
                'required',
                Rule::exists('document_statuses', 'id')
            ],
        ];
    }

    public function mount(Document $document)
    {
        $this->document = $document;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.document-form', [
            'departments' => Department::pluck('name', 'id'),
            'document_statuses' => DocumentStatus::pluck('name', 'id')
        ]);
    }

    // CRUD

    public function save()
    {
        $this->validate();

        if ($this->file) {
            $this->document->file = $this->uploadFile();
        }

        $this->document->save();

        session()->flash('flash.banner', __('Document saved'));
        session()->flash('flash.bannerStyle', 'success');

        return $this->redirectRoute('documents.index');
    }

    // IMAGES

    public function uploadFile()
    {
        if ($oldFile = $this->document->file) {
            Storage::disk('public')->delete($oldFile);
        }

        return $this->file->store('/documents', 'public');
    }
}
