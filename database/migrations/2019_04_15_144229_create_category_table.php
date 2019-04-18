<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title')->unique();
            $table->longText('description');
            $table->string('image');
        });

        DB::table('categories')->insert(array(
            'title' => 'Confiance',
            'description' => \Faker\Provider\Lorem::paragraph('1'),
            'image' => 'confiance.jpg'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
