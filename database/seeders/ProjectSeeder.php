<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_technology')->truncate();

        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        Storage::deleteDirectory('images');
        Storage::makeDirectory('images');

        for ($i = 0; $i < 30; $i++) {
            
            $coverImg = null;

            /* while($coverImg == null) {
                $coverImg = fake()->image(storage_path('app/public/images'), 360, 360, null, false, false, false, false, 'jpg');
            } */

            $coverImg = fake()->image(storage_path('app/public/images'), 360, 360, null, false, false, false, false, 'jpg');

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
            $newProject->technologies()->attach(fake()->randomElements([1, 2, 3, 4], 3));
        }
    }
}
