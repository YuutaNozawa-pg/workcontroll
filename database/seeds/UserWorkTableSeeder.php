<?php

use Illuminate\Database\Seeder;

class UserWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userwork = factory(App\UserWork::class, 50)->create();
    }
}
