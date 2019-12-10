<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('telephone')->nullable();
            $table->text('idea')->nullable();
            $table->text('description')->nullable();
            $table->string('budget')->nullable();
            $table->string('time_done')->nullable();
            $table->bigInteger('field_industry_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('field_industry_id')->references('id')->on('field_industries')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_requests');
    }
}
