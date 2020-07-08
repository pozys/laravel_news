<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News_Categories_Relations_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories_relations')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 300; $i++) {
            $item = [];
            $j = 0;
            // Добиваемся уникальности значений
            while (true and $j < 100000) {
                $j++;
                $news_id = $faker->numberBetween(1, 100);
                $category_id = $faker->numberBetween(1, 6);

                $item = [
                    'news_id' => $news_id,
                    'category_id' => $category_id
                ];

                if (!in_array($item, $data)) {
                    break;
                }
            }

            $data[] = $item;
        }
        return $data;
    }
}
