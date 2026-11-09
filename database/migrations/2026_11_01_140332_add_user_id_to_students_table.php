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
        // The user_id column is already added by the earlier migration.
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        // This duplicate migration owns no schema changes to reverse.
    }
};

