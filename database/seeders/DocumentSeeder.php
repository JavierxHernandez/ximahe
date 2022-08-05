<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\Document;
use App\Models\DocumentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            Document::factory(2)
            ->for(Department::find(rand(1,8)))
            ->create([
                'document_status_id' => rand(1,8)
            ]);

        }
    }
}
