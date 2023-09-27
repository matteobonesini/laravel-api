<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $type = ['HTML', 'CSS', 'JavaScript', 'PHP'];

        for ($i = 0; $i < 4; $i++) {
            $newType = new Technology();
            $newType->title = $type[$i];
            $newType->save();
        }
    }
}
