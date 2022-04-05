<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'samples');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'samples',
                'display_name_singular' => __('joy-voyager-bread-sample::seeders.data_types.sample.singular'),
                'display_name_plural'   => __('joy-voyager-bread-sample::seeders.data_types.sample.plural'),
                'icon'                  => 'voyager-bread voyager-bread-sample voyager-paw',
                'model_name'            => 'Joy\\VoyagerBreadSample\\Models\\Sample',
                // 'policy_name'           => 'Joy\\VoyagerBreadSample\\Policies\\SamplePolicy',
                // 'controller'            => 'Joy\\VoyagerBreadSample\\Http\\Controllers\\VoyagerBreadSampleController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
