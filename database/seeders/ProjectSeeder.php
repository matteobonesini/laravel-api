<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = fake()->firstName();
            $newProject->slug = str()->slug($newProject->title);
            $newProject->description = fake()->paragraph();
            $newProject->type_id = fake()->numberBetween(1, 3);
            $newProject->save();
        }
    }
}
