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
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('travel_package_id', 'travel_packages_id');
            $table->renameColumn('user_id', 'users_id');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('travel_packages_id', 'travel_package_id');
            $table->renameColumn('users_id', 'user_id');
        });
    }
};
