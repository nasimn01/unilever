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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('alt_code');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('bangla_name')->nullable();
            $table->string('owner')->nullable();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('channel')->nullable();
            $table->string('region')->nullable();
            $table->string('town')->nullable();
            $table->string('distributor_code')->nullable();
            $table->string('route_code')->nullable();
            $table->string('route_name')->nullable();
            $table->date('outlet_create_date')->nullable();
            $table->string('frequency')->nullable();
            $table->string('sales_officer')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('outlets');
    }
};
