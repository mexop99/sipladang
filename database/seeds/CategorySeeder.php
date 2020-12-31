<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "name" => "Outdoor & Olahraga",
            "slug" => "outdoor-olahraga-1",
            "image" => "category_image/ENDXsdxW6vJF0oSs1gYhCPnPhdUWQFAa9MTk52T0.png",
            "created_by" => 1
        ]);
    }
}
