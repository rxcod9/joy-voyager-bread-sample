<?php

namespace Joy\VoyagerBreadSample\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = Voyager::model('DataType')->where('slug', 'samples')->firstOrFail();
        $order    = Voyager::model('DataRow')->whereDataTypeId($dataType->id)->max('order') ?? 0;

        $dataRow = $this->dataRow($dataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.description'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.image'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'multiple_images');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'multiple_images',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.multiple_images'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'media_picker');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'media_picker',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.media_picker'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
                'details' => [
                    "max" => 10,
                    "min" => 0,
                    "expanded" => true,
                    "show_folders" => true,
                    "show_toolbar" => true,
                    "allow_upload" => true,
                    "allow_move" => true,
                    "allow_delete" => true,
                    "allow_create_folder" => true,
                    "allow_rename" => true,
                    "allow_crop" => true,
                    "allowed" => [],
                    "hide_thumbnails" => false,
                    "quality" => 90,
                    // "watermark" => [
                    //     "source" => "...",
                    //     "position" => "top-left",
                    //     "x" => 0,
                    //     "y" => 0
                    // ]
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.status'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
                'details'      => [
                    'default' => Voyager::model('Sample')::ACTIVE,
                    'options' => [
                        Voyager::model('Sample')::ACTIVE   => Voyager::model('Sample')::ACTIVE,
                        Voyager::model('Sample')::INACTIVE => Voyager::model('Sample')::INACTIVE,
                        Voyager::model('Sample')::EXPIRED  => Voyager::model('Sample')::EXPIRED,
                    ],
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'base64_image'); // string @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.base64_image'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'browse'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'file',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.browse'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'checkbox'); // boolean
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.checkbox'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "on" => "On Text",
                    "off" => "Off Text",
                    "checked" => true
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'multiple_checkbox');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'multiple_checkbox',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.multiple_checkbox'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "checked" => true,
                    "options" => [
                        "checkbox1" => "Checkbox 1 Text",
                        "checkbox2" => "Checkbox 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'wysiwyg'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.wysiwyg'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'color'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'color',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.color'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'color_picker'); // string @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'color',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.color_picker'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'date'); // date
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.date'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'date_picker'); // date
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.date_picker'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'start_date'); // date
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.start_date'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'end_date'); // date
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.end_date'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'datetime'); // dateTime
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.datetime'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'datetime_picker'); // dateTime
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.datetime_picker'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'email'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.email'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'hidden'); // integer
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.hidden'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'icon_picker'); // string @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.icon_picker'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    'default' => 'ICON1',
                    'options' => [
                        'ICON1'   => 'ICON 1',
                        'ICON2' => 'ICON 2',
                        'ICON3'  => 'ICON 3',
                    ],
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'month'); // @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.month'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'number'); // integer
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.number'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details' => [
                    "step" => 1,
                    "min" => 0,
                    "max" => 10,
                    "default" => 1
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'float'); // float
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.float'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details' => [
                    "step" => 0.1,
                    "min" => 0,
                    "max" => 10,
                    "default" => 1
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'password'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'password',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.password'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'radio'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'radio_btn',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.radio'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "radio1",
                    "options" => [
                        "radio1" => "Radio Button 1 Text",
                        "radio2" => "Radio Button 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'range'); // string @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.range'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details' => [
                    "step" => 0.1,
                    "min" => 0,
                    "max" => 10,
                    "default" => 1
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'select'); // integer
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.select'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "1",
                    "options" => [
                        "1" => "Option 1 Text",
                        "2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'multiple_select');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_multiple',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.multiple_select'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "option1",
                    "options" => [
                        "option1" => "Option 1 Text",
                        "option2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'select_from_array'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.select_from_array'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "option1",
                    "options" => [
                        "option1" => "Option 1 Text",
                        "option2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'select2'); // integer
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.select2'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "1",
                    "options" => [
                        "1" => "Option 1 Text",
                        "2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'select2_from_ajax'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.select2_from_ajax'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "option1",
                    "options" => [
                        "option1" => "Option 1 Text",
                        "option2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'select2_from_array'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.select2_from_array'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details'      => [
                    "default" => "option1",
                    "options" => [
                        "option1" => "Option 1 Text",
                        "option2" => "Option 2 Text"
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'simplemde'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'markdown_editor',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.simplemde'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'summernote'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'code_editor',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.summernote'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'table'); // text @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.table'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'textarea'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.textarea'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'text'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.text'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'tinymce'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.tinymce'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'upload'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'file',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.upload'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'upload_multiple'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'file',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.upload_multiple'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'url'); // string
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.url'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'video'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.video'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'week'); // string @todo
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'date',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.week'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'coordinates'); // point
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'coordinates',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.coordinates'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => ++$order,
                'details' => [
                    "showAutocompleteInput" => true,
                    "showLatLngInput" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'extras'); // text
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.extras'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }


        $dataRow = $this->dataRow($dataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.deleted_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'sample_belongsto_created_by_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.created_by'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => Voyager::modelClass('User'),
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'created_by_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'created_by_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.created_by'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'sample_belongsto_modified_by_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.modified_by'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => Voyager::modelClass('User'),
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'modified_by_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'modified_by_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.modified_by'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'sample_belongsto_assigned_to_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.assigned_to'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => Voyager::modelClass('User'),
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'assigned_to_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'assigned_to_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.assigned_to'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'sample_belongsto_parent_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.parent'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => Voyager::modelClass('Sample'),
                    'table'       => 'samples',
                    'type'        => 'belongsTo',
                    'column'      => 'parent_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'samples',
                    'pivot'       => 0,
                ],
                'order'        => ++$order,
            ])->save();
        }

        $dataRow = $this->dataRow($dataType, 'parent_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('joy-voyager-bread-sample::seeders.data_rows.parent'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => ++$order,
            ])->save();
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return Voyager::model('DataRow')->firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
