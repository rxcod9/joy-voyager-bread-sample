<?php

declare(strict_types=1);

use TCG\Voyager\Events\Routing;
use TCG\Voyager\Events\RoutingAdmin;
use TCG\Voyager\Events\RoutingAdminAfter;
use TCG\Voyager\Events\RoutingAfter;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Voyager Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Voyager.
|
*/

Route::group(['prefix' => config('joy-voyager-bread-sample.admin_prefix', 'admin')], function () {
    Route::group(['as' => 'voyager.'], function () {
        // event(new Routing()); @deprecated

        $namespacePrefix = '\\'.config('joy-voyager-bread-sample.controllers.namespace').'\\';

        Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
            // event(new RoutingAdmin()); @deprecated

            $breadController = $namespacePrefix.'VoyagerBaseController';

            try {
                foreach (Voyager::model('DataType')::all() as $dataType) {
                    // Route::get($dataType->slug . '/bread-sample', $breadController.'@breadSample')->name($dataType->slug.'.bread-sample');
                }
            } catch (\InvalidArgumentException $e) {
                throw new \InvalidArgumentException("Custom routes hasn't been configured because: ".$e->getMessage(), 1);
            } catch (\Exception $e) {
                // do nothing, might just be because table not yet migrated.
            }

            // Route::get('bread-sample', $breadController.'@breadSampleAll')->name('bread-sample-all');

            // event(new RoutingAdminAfter()); @deprecated
        });

        // event(new RoutingAfter()); @deprecated
    });
});
