<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = DB::getDriverName();
        $prefix = DB::getTablePrefix();

        switch ($driver) {
            case 'pgsql':
                $columnType = 'BYTEA';
                break;
            case 'mysql':
                $columnType = 'MEDIUMBLOB';
                break;
            case 'sqlite':
                $columnType = 'BLOB';
                break;
        }

        Schema::create('samples', function (Blueprint $table) use ($columnType) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();

            $table->bigInteger('parent_id')->unsigned()->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('samples')->onUpdate('cascade')->onDelete('set null');

            $table->enum('status', ['ACTIVE', 'INACTIVE', 'EXPIRED'])->default('ACTIVE');

            $table->string('address')->nullable();
            if (!isset($columnType)) {
                $table->binary('base64_image')->nullable();
            }
            $table->string('browse')->nullable();
            $table->boolean('checkbox')->nullable();
            $table->text('wysiwyg')->nullable();
            $table->string('color')->nullable();
            $table->string('color_picker')->nullable();
            $table->date('date')->nullable();
            $table->date('date_picker')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->dateTime('datetime_picker')->nullable();
            $table->string('email')->nullable();
            $table->integer('hidden')->nullable();
            $table->string('icon_picker')->nullable();
            // $table->string('image')->nullable();
            $table->string('month')->nullable();
            $table->integer('number')->nullable();
            $table->float('float')->nullable();
            $table->string('password')->nullable();
            $table->string('radio')->nullable();
            $table->string('range')->nullable();
            $table->integer('select')->nullable();
            $table->string('select_from_array')->nullable();
            // select_multiple
            $table->integer('select2')->nullable();
            $table->string('select2_from_ajax')->nullable();
            $table->string('select2_from_array')->nullable();
            // select2_from_ajax_multiple
            $table->text('simplemde')->nullable();
            $table->text('summernote')->nullable();
            $table->text('table')->nullable();
            $table->text('textarea')->nullable();
            $table->string('text');
            $table->text('tinymce')->nullable();
            $table->string('upload')->nullable();
            $table->string('upload_multiple')->nullable();
            $table->string('url')->nullable();
            $table->text('video')->nullable();
            $table->string('week')->nullable();
            $table->text('extras')->nullable();

            $table->acmts();
        });

        if (isset($columnType)) {
            DB::statement("ALTER TABLE `samples` ADD base64_image {$columnType} NULL");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
