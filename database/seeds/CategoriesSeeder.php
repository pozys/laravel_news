<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 6; $i++) {
            $data[] = [
                'name' => $faker->sentence(rand(1, 2)),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ];
        }
        return $data;
    }
}
