<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $type = ['Backend', 'Frontend', 'FullStack'];

        for ($i = 0; $i < 3; $i++) {
            $newType = new Type();
            $newType->title = $type[$i];
            $newType->save();
        }
    }
}
