<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('nim')->nullable()->change();
            $table->string('kategori')->nullable()->change();
        });
    }

    public function down(): void
    {
        DB::table('aspirasis')->whereNull('nim')->update(['nim' => '-']);
        DB::table('aspirasis')->whereNull('kategori')->update(['kategori' => 'Umum']);

        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('nim')->nullable(false)->change();
            $table->string('kategori')->nullable(false)->change();
        });
    }
};
