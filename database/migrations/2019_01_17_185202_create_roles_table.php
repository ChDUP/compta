<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Insert les rôles
        DB::table('roles')->insert(
            array(
                'name' => 'Administrateur',
                'created_at' => now(),
                'updated_at' => now()

            )
        );
        DB::table('roles')->insert(
            array(
                'name' => 'Comptable',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('roles')->insert(
            array(
                'name' => 'Utilisateur',
                'created_at' => now(),
                'updated_at' => now()
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
        Schema::dropIfExists('roles');
    }
}
