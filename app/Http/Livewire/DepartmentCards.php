<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Department;
use Livewire\Component;

class DepartmentCards extends Component
{
    public Company $company;

    public function render()
    {
        $departments = Department::where('company_id', $this->company->id)->paginate(4);

        return view('livewire.department-cards', compact('departments'))->layout('layouts.guest');
    }
}
