<?php

use App\Model\Tuto;
use Illuminate\Database\Seeder;

class TutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tuto::class, 50)->create();
    }
}
