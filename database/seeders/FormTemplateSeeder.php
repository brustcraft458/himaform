<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Section;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample
        $user = User::where('role', 'admin')->first();
        $department = Department::where('name', 'penristek')->first();

        // Create
        $template = Template::firstOrCreate([
            'title' => 'Perancangan Pusat Data Himatif',
            'visibility' => 'private',
            'total_viewed' => 5,
            'total_respondent' => 2,
            'id_user' => $user['id'],
            'id_department' => $department['id']
        ]);

        // Create Section: Nama, Deskripsi
        Section::firstOrCreate([
            'label' => 'Judul:',
            'type' => 'text',
            'id_template' => $template['id']
        ]);

        Section::firstOrCreate([
            'label' => 'Deskripsi:',
            'type' => 'text',
            'id_template' => $template['id']
        ]);

    }
}
