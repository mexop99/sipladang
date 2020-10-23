<?php

use App\Distributor;
use Illuminate\Database\Seeder;

class DistributorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distributors = factory(Distributor::class, 10)->create();
    }
}
