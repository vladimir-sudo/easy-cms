<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTypePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_type_properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->nullable()->unsigned();;

            $table->index('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('item_types')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('field_name');
            $table->string('type');

            $table->bigInteger('tab_id')->nullable()->unsigned();;

            $table->index('tab_id');
            $table->foreign('tab_id')
                ->references('id')
                ->on('item_type_properties')
                ->onDelete('cascade');

            $table->integer('order_index')->default(0);
            $table->boolean('multi_language')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_type_properties');
    }
}
