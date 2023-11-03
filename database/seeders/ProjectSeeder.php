<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)

    {

        $types = Type::all()->pluck('id');


        for($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->title = $faker->catchPhrase();
            $project->content = $faker->paragraphs(3, true);
            $project->type_id = $faker->randomElement($types);
            $project->save();

        }
    }
}
