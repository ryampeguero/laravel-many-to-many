<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technoArray = [
            'HTML',
            'CSS',
            'JavaScript',
            'React',
            'Angular',
            'Vue.js',
            'Webpack',
            'Babel',
            'SASS'
        ];

        foreach ($technoArray as $techno) {
            $newTechno = new Technology();
            $newTechno->name = $techno;
            $newTechno->slug = Str::slug($techno);
            $newTechno->save();
        }
    }
}
