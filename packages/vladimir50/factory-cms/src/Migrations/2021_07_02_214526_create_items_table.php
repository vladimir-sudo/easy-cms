<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->nullable()->unsigned();

            $table->index('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('item_types')
                ->onDelete('cascade');

            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('order_index')->nullable();

            $table->bigInteger('parent_id')->nullable()->unsigned();

            $table->index('parent_id');
            $table->foreign('parent_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->string('slug')->unique();

            $table->dateTime('archived_at')->nullable();
            $table->dateTime('published_at')->nullable();

            $table->boolean('visible')->default(true);

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
        Schema::dropIfExists('items');
    }
}
