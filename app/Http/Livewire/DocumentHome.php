<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentHome extends Component
{
    public Department $department;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $previewModal = false;

    public function render()
    {
        // $documents = Document::where('department_id', $this->department->id)->paginate(4);
        // dump($this->search);
        return view('livewire.document-home', [
            'documents' => Document::searchHome($this->search, $this->department->id)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ])->layout('layouts.guest');

        // return view('livewire.document-home', compact('documents'))->layout('layouts.guest');
    }

    public function export($document)
    {
        return Storage::disk('public')->download($document['file'], Str::replace(' ', '-', $document['name']));
    }

    public function openPreviewModal()
    {
        $this->previewModal = true;
    }

    public function closePreviewModal()
    {
        $this->previewModal = false;
    }
}
