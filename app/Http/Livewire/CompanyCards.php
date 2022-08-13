<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyCards extends Component
{
    use WithPagination;
    public function render()
    {
        $companies = Company::paginate(4);
        return view('livewire.company-cards', compact('companies'))->layout('layouts.guest');
    }
}
