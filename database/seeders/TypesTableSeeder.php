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
            "Web Development",
            "Mobile App Development",
            "Data Analysis",
            "Machine Learning",
            "Artificial Intelligence",
            "Digital Marketing",
            "Graphic Design",
            "Content Writing",
            "SEO Optimization",
            "E-commerce",
            "IT Support",
            "Network Administration",
            "Cybersecurity",
            "Cloud Computing",
            "Blockchain",
            "AR/VR Development",
            "IoT (Internet of Things)",
            "Game Development",
            "Software Testing",
            "Project Management"
        ];



        foreach ($typeArray as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
