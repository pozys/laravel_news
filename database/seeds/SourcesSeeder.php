<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'source' => $faker->domainName(),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ];
        }
        return $data;
    }
}
