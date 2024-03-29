<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('sample.key1');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-bread-sample::seeders.settings.sample.key1'),
                'value'        => 'Joy Voyager',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Sample',
            ])->save();
        }

        $setting = $this->findSetting('sample.image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-bread-sample::seeders.settings.sample.image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 2,
                'group'        => 'Sample',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Voyager::model('Setting')->firstOrNew(['key' => $key]);
    }
}
