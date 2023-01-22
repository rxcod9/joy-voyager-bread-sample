<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Database\Seeders\PermissionsTableSeeder as VoyagerPermissionsTableSeeder;
use TCG\Voyager\Facades\Voyager;

class PermissionsTableSeeder extends VoyagerPermissionsTableSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Voyager::model('Permission')->generateFor('samples');
    }
}
