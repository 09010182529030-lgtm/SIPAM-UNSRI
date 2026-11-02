<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['pengaduan_id', 'status']);
        });

        DB::table('pengaduans')
            ->orderBy('id')
            ->chunkById(500, function ($pengaduans): void {
                foreach ($pengaduans as $pengaduan) {
                    $createdAt = $pengaduan->created_at ?? now();
                    $history = [[
                        'pengaduan_id' => $pengaduan->id,
                        'status' => 'Dikirim',
                        'note' => null,
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt,
                    ]];

                    if (in_array($pengaduan->status, ['Diverifikasi', 'Diproses', 'Selesai'], true)) {
                        $updatedAt = $pengaduan->updated_at ?? $createdAt;
                        $history[] = [
                            'pengaduan_id' => $pengaduan->id,
                            'status' => $pengaduan->status,
                            'note' => null,
                            'created_at' => $updatedAt,
                            'updated_at' => $updatedAt,
                        ];
                    }

                    DB::table('pengaduan_status_histories')->insert($history);
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan_status_histories');
    }
};
