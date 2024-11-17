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
        Schema::table('applications', function (Blueprint $table) {
            Schema::table('applications', function (Blueprint $table) {
                // Add the user_id field as a foreign key
                $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Place it after the 'id' field
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
           // Drop the foreign key and column
           $table->dropForeign(['user_id']);
           $table->dropColumn('user_id');
        });
    }
};
