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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->string('role')->after('name');
            $table->integer('age')->length(3)->after('role');
            $table->string('telno', 16)->after('age');
            $table->string('school')->nullable()->after('telno');
            $table->integer('standard')->length(1)->nullable()->after('school');
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->boolean('is_first')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
