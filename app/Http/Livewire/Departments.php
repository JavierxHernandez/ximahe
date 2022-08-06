<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Departments extends Component
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
        return view('livewire.departments', [
            'departments' =>  Department::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ]);
    }

    // MODAL

    public function openDeleteForm($departmentId)
    {
        $this->showDeleteModal = true;
        $this->departmentId = $departmentId;
    }

    public function closeDeleteForm()
    {
        $this->showDeleteModal = false;
    }

    public function delete()
    {
        $departmentToDelete = Department::find($this->departmentId);

        if ($departmentToDelete->image != 'images/default-placeholder.png') {
            Storage::disk('public')->delete($departmentToDelete->image);
        }

        $departmentToDelete->delete();
        $this->showDeleteModal = false;
        $this->emit('deleted');
    }
}
