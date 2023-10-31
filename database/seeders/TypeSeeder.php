<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $labels = ["Tipo1", "Tipo2", "Tipo3", "Tipo4", "Tipo5"];
    
      foreach($labels as $label) {
        $type = new Type();
        $type->label = $label;
        // ...
        $type->save();
      }
    }
}
