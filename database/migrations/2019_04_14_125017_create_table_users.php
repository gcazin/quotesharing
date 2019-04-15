<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{

    const USER = 1;
    const ADMIN = 2;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('user.jpg');
            $table->integer('role')->default(self::USER);
            $table->text('remember_token')->nullable();
            $table->timestamps();
        });

        /**
         * Create admin
         */
        DB::table('users')->insert(
            array(
                'last_name' => 'Cazin',
                'first_name' => 'Guillaume',
                'username' => 'admin',
                'email' => 'czn.guillaume@gmail.com',
                'password' => bcrypt('Czn220199'),
                'role' => self::ADMIN,
            )
        );
        DB::table('users')->insert(
            array(
                'last_name' => 'Membre',
                'first_name' => 'Membre',
                'username' => 'membre',
                'email' => 'membre@membre.fr',
                'password' => bcrypt('Czn220199'),
                'role' => self::USER,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
