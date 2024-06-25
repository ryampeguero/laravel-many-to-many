<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeArray = [
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

        foreach ($typeArray as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
