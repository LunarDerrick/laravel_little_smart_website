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
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('scoreid')->primary();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mandarin')->length(3);
            $table->integer('english')->length(3);
            $table->integer('malay')->length(3);
            $table->integer('math')->length(3);
            $table->integer('science')->length(3);
            $table->integer('history')->nullable()->length(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('scores')) {
            Schema::table('scores', function (Blueprint $table) {
                $table->dropForeign(['userid']);
            });
        }

        Schema::dropIfExists('scores');
    }
};
