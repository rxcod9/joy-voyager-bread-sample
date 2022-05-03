<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Joy\VoyagerBreadSample\Models\Sample;
use Illuminate\Database\Seeder;

class DummySamplesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;
        Sample::factory()
            ->count($count)
            ->state(function (array $attributes) use ($count) {
                return [
                    'name' => 'Sample ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count),
                    'description' => 'Sample Description ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                ];
            })
            ->create();
    }
}
