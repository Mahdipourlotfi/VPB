<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('settingsitems_id')->unsigned();
            $table->foreign('settingsitems_id')->references('id')->on('settingsitems')->onDelete('cascade')->onUpdate('cascade');
            $table->string('value');
          
            $table->unique(['user_id','settingsitems_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function(Blueprint $table)
        {
            $table->dropForeign('settings_user_id_foreign');
        });
        Schema::drop('settings');
    }
};
