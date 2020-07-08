<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(3, 6)),
                'brief' => $faker->realText(rand(80, 200)),
                'body' => $faker->realText(rand(500, 2000)),
                'source_id' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ];
        }
        return $data;
    }
}
