<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;

    public $showDeleteModal = false;
    public $companyId;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.companies', [
            'companies' =>  Company::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ]);
    }

    // MODAL

    public function openDeleteForm($companyId)
    {
        $this->showDeleteModal = true;
        $this->companyId = $companyId;
    }

    public function closeDeleteForm()
    {
        $this->showDeleteModal = false;
    }

    public function delete()
    {
        $companyToDelete = Company::find($this->companyId);

        if ($companyToDelete->image != 'images/default-placeholder.png') {
            Storage::disk('public')->delete($companyToDelete->image);
        }

        $companyToDelete->delete();

        session()->flash('flash.banner', __('Company saved'));
        session()->flash('flash.bannerStyle', 'danger');

        $this->showDeleteModal = false;
        $this->emit('deleted');
    }
}
