<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('courses', 'tittle') && ! Schema::hasColumn('courses', 'title')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->renameColumn('tittle', 'title');
            });
        }

        if (! Schema::hasColumn('courses', 'description')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->text('description')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('courses', 'description')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('description');
            });
        }

        if (Schema::hasColumn('courses', 'title') && ! Schema::hasColumn('courses', 'tittle')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->renameColumn('title', 'tittle');
            });
        }
    }
};
