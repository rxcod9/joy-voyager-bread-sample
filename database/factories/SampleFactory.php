<?php

namespace Joy\VoyagerBreadSample\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Joy\VoyagerBreadSample\Models\Sample;

class SampleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sample::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $checkboxKey = $this->faker->randomKey([
            'checkox1' => 'Checkbox1',
            'checkox2' => 'Checkbox2',
        ]);

        return [
            'name'               => $this->faker->name(),
            'description'        => $this->faker->text(500),
            'address'            => $this->faker->address(),
            'base64_image'       => null,
            'browse'             => null, // file
            'checkbox'           => $this->faker->boolean(),
            'multiple_checkbox'  => json_encode([
                $checkboxKey => $checkboxKey,
            ]),
            'wysiwyg'            => $this->faker->paragraph(5),
            'color'              => $this->faker->hexColor(),
            'color_picker'       => $this->faker->hexColor(),
            'date'               => $this->faker->dateTimeBetween('-1month', 'now')->format('Y-m-d'),
            'date_picker'        => $this->faker->dateTimeBetween('-1month', 'now')->format('Y-m-d'),
            'start_date'         => $this->faker->dateTimeBetween('-1month', 'now')->format('Y-m-d'),
            'end_date'           => $this->faker->dateTimeBetween('now', '+1month')->format('Y-m-d'),
            'datetime'           => $this->faker->dateTimeBetween('-1month', 'now'),
            'datetime_picker'    => $this->faker->dateTimeBetween('-1month', 'now'),
            'email'              => $this->faker->email(),
            'hidden'             => $this->faker->numberBetween(1, 10),
            'icon_picker'        => null,
            'image'              => null, // dummy image
            'multiple_images'    => null, // dummy image
            'media_picker'       => null, // dummy image
            'month'              => $this->faker->month(),
            'number'             => $this->faker->numberBetween(1, 10),
            'float'              => $this->faker->numberBetween(100, 5000) / 100,
            'password'           => bcrypt('sample'),
            'radio'              => $this->faker->randomKey([
                'radio1' => 'Radio1',
                'radio2' => 'Radio2',
            ]),
            'range'              => $this->faker->numberBetween(1, 10),
            'select'             => $this->faker->randomKey([
                "1" => "Option 1 Text",
                "2" => "Option 2 Text",
            ]),
            'multiple_select'    => $this->faker->randomKey([
                "option1" => "Option 1 Text",
                "option2" => "Option 2 Text",
            ]),
            'select_from_array'  => $this->faker->randomKey([
                "option1" => "Option 1 Text",
                "option2" => "Option 2 Text",
            ]),
            'select2'            => $this->faker->randomKey([
                "1" => "Option 1 Text",
                "2" => "Option 2 Text",
            ]),
            'select2_from_ajax'  => $this->faker->randomKey([
                "option1" => "Option 1 Text",
                "option2" => "Option 2 Text",
            ]),
            'select2_from_array' => $this->faker->randomKey([
                "option1" => "Option 1 Text",
                "option2" => "Option 2 Text",
            ]),
            'simplemde'          => $this->faker->paragraph(5),
            'summernote'         => $this->faker->paragraph(5),
            'table'              => null,
            'textarea'           => $this->faker->paragraph(5),
            'text'               => $this->faker->text(20),
            'tinymce'            => $this->faker->paragraph(5),
            'upload'             => null,
            'upload_multiple'    => null,
            'url'                => $this->faker->url(),
            'video'              => $this->faker->url(),
            'week'               => null,
            'coordinates'        => null,
            'extras'             => null,
        ];
    }
}
