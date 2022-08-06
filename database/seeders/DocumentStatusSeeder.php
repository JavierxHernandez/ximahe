<?php

namespace Database\Seeders;

use App\Models\DocumentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DocumentStatus::factory(8)->create();
        DB::table('document_statuses')->insert([
            'name' => 'Solo ver',
            'Description' => 'Los documentos con este estado solo se podrán ver.'
        ]);
        DB::table('document_statuses')->insert(
        [
            'name' => 'Ver y Descargar',
            'Description' => 'Los documentos con este estado se podrán ver y descargar.'
        ]);
    }
}
