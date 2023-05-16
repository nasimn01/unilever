<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('outlet_id');
            $table->string('jso_id')->nullable();
            $table->string('sr_id')->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->decimal('paid_amount',10,2)->nullable();
            $table->decimal('due_amount',10,2)->nullable();
            $table->string('memu_date')->nullable();
            $table->string('next_due_collection_date')->nullable();
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
        Schema::dropIfExists('memus');
    }
};
