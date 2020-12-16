<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnityRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unity_relationships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_unity_id')->nullable()->default(null);
            $table->foreign('company_unity_id')->references('id')->on('company_unities')->onDelete('set null');
            $table->unsignedBigInteger('company_id')->nullable()->default(null);
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
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
        Schema::dropIfExists('unity_relationships');
    }
}
