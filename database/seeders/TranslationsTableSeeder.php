<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadSample\Models\Sample;
use TCG\Voyager\Facades\Voyager;

use TCG\Voyager\Models\{
    MenuItem,
    Translation
};

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->samplesTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function samplesTranslations()
    {
        // Adding translations for 'samples'
        //
        $cat = Voyager::model('Sample')->where('name', 'sample-1')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['samples', 'name'], $cat->id), 'sample-1');
            $this->trans('pt', $this->arr(['samples', 'description'], $cat->id), 'Sample 1');
        }
        $cat = Voyager::model('Sample')->where('name', 'sample-2')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['samples', 'name'], $cat->id), 'sample-2');
            $this->trans('pt', $this->arr(['samples', 'description'], $cat->id), 'Sample 2');
        }
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];

        $dtp = Voyager::model('DataType')->where($_fld, __('joy-voyager-bread-sample::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Sample');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp  = Voyager::model('DataType')->where($_fld, __('joy-voyager-bread-sample::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Samples');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl  = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('joy-voyager-bread-sample::seeders.menu_items.samples'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Samples');
        }
    }

    private function findMenuItem($title)
    {
        return Voyager::model('MenuItem')->where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
