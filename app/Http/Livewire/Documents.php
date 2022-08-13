<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Documents extends Component
{
    use WithPagination;

    public $showDeleteModal = false;
    public $departmentId;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.documents', [
            'documents' =>  Document::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ]);
    }

    // MODAL

    public function openDeleteForm($documentId)
    {
        $this->showDeleteModal = true;
        $this->documentId = $documentId;
    }

    public function closeDeleteForm()
    {
        $this->showDeleteModal = false;
    }

    public function delete()
    {
        $documentToDelete = Document::find($this->documentId);

        // if ($documentToDelete->document_path != 'documents/default-placeholder.png') {
        //     Storage::disk('public')->delete($documentToDelete->document_path);
        // }
        Storage::disk('public')->delete($documentToDelete->file);
        $documentToDelete->delete();
        $this->showDeleteModal = false;
        $this->emit('deleted');
    }
}
