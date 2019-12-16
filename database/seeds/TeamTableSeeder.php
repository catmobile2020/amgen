<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Team::class, 10)
            ->create()
            ->each(function ($u) {
                $u->sets()->save(factory(App\Set::class)->make())
                    ->each(function ($u) {
                        $u->questions()->save(factory(App\Question::class)->make())
                            ->each(function ($u) {
                                for ($i=0;$i<2;$i++)
                                {
                                    $u->answers()->save(factory(App\Answer::class)->make());
                                }
                            });
                    });
            });
    }
}
