<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent')->nullable();
            $table->timestamps();
        });

        // Insert les entités
        DB::table('companies')->insert(
            array(
                'name' => 'Local',
                'created_at' => now(),
                'updated_at' => now()

            )
        );
        DB::table('companies')->insert(
            array(
                'name' => 'Cabinet Infirmier du Val des Usses',
                'parent' => 1,
                'created_at' => now(),
                'updated_at' => now()

            )
        );
        DB::table('companies')->insert(
            array(
                'name' => 'Gaëlle MARTY',
                'parent' => 2,
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('companies')->insert(
            array(
                'name' => 'Sophie BAUDET',
                'parent' => 2,
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
        Schema::dropIfExists('companies');
    }
}
