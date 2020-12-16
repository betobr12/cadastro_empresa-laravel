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
            $table->bigIncrements('id');
            $table->string('cnpj',14)->nullable()->default(null);
            $table->string('social_reason')->nullable()->default(null);
            $table->string('fantasy_name')->nullable()->default(null);
            $table->integer('zip_code')->nullable()->default(null);
            $table->string('public_place')->nullable()->default(null);
            $table->integer('number')->nullable()->default(null);
            $table->string('phone',11)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('complement')->nullable()->default(null);
            $table->string('district')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state',2)->nullable()->default(null);
            $table->unsignedBigInteger('segment_id')->nullable()->default(null);
            $table->foreign('segment_id')
                    ->references('id')
                    ->on('segments')
                    ->onDelete('set null');
            $table->string('municipal_registration')->nullable()->default(null);
            $table->string('state_registration')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();

        });
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
