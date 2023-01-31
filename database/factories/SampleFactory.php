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
        return [
            'name'               => $this->faker->name(),
            'description'        => $this->faker->text(500),
            'address'            => $this->faker->address(),
            'base64_image'       => null,
            'browse'             => null, // file
            'checkbox'           => $this->faker->boolean(),
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
            'month'              => $this->faker->month(),
            'number'             => $this->faker->numberBetween(1, 10),
            'float'              => $this->faker->numberBetween(100, 5000) / 100,
            'password'           => bcrypt('sample'),
            'radio'              => $this->faker->randomKey([
                'Radio1' => 'Radio1',
                'Radio2' => 'Radio2',
            ]),
            'range'              => $this->faker->numberBetween(1, 10),
            'select'             => $this->faker->randomKey([
                '1' => 'One',
                '2' => 'Two',
            ]),
            'select_from_array'  => $this->faker->randomKey([
                'Option1' => 'Option1',
                'Option2' => 'Option2',
            ]),
            'select2'            => $this->faker->randomKey([
                '1' => 'One',
                '2' => 'Two',
            ]),
            'select2_from_ajax'  => null,
            'select2_from_array' => $this->faker->randomKey([
                'Option1' => 'Option1',
                'Option2' => 'Option2',
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
            'extras'             => null,
            'status'             => $this->faker->randomKey([
                Sample::ACTIVE   => Sample::ACTIVE,
                Sample::INACTIVE => Sample::INACTIVE,
                Sample::EXPIRED  => Sample::EXPIRED,
            ]),
        ];
    }

    /**
     * Indicate that the model's status should be active.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Sample::ACTIVE,
            ];
        });
    }

    /**
     * Indicate that the model's status should be inactive.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Sample::INACTIVE,
            ];
        });
    }

    /**
     * Indicate that the model's status should be expired.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function expired()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Sample::EXPIRED,
            ];
        });
    }
}
