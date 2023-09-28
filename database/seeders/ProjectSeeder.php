<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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

        Storage::deleteDirectory('images');
        Storage::makeDirectory('images');

        for ($i = 0; $i < 10; $i++) {
            
            $coverImg = null;

            while($coverImg == null) {
                $coverImg = fake()->image(storage_path('app/public/images'), 360, 360, 'animals', false, true, null, true, 'jpg');
            }

            // $coverImg = fake()->image(storage_path('app/public/images'), 360, 360, 'animals', false, true, null, true, 'jpg');

            if ($coverImg != '') {
                $coverImg = 'images/'.$coverImg;
                var_dump($coverImg);
            }
            else {
                $coverImg = null;
            }

            $newProject = new Project();
            $newProject->title = fake()->firstName();
            $newProject->slug = str()->slug($newProject->title);
            $newProject->img_src = $coverImg;
            $newProject->description = fake()->paragraph();
            $newProject->type_id = fake()->numberBetween(1, 3);
            $newProject->save();
        }
    }
}
