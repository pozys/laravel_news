<?php

use App\Models\Source;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Source $source)
    {
        DB::table('sources')->insert($this->getData($source));
    }

    private function getData($source): array
    {
        $data = [];

        foreach ($source->getPredefinedSources() as $item) {
            $data[] = [
                'id' => $item['id'],
                'source' => $item['domainName'],
                'created_at' => date('Y-m-d')
            ];
        }

        return $data;
    }
}
