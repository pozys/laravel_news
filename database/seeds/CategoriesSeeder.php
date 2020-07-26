<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Category $category)
    {
        DB::table('categories')->insert($this->getData($category));
    }

    private function getData($category): array
    {
        $data = [];

        foreach ($category->getPredefinedCategories() as $key => $item) {
            $data[] = [
                'name' => $key,
                'id' => $item,
                'created_at' => date('Y-m-d')
            ];
        }

        return $data;
    }
}
