<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\PengumumanTindakLanjut;

class TransparansiController extends Controller
{
    public function index()
    {
        $totalReports = Pengaduan::count();
        $completedReports = Pengaduan::where('status', 'Selesai')->count();
        $resolutionRate = $totalReports > 0
            ? (int) round(($completedReports / $totalReports) * 100)
            : 0;

        $categoryCounts = Pengaduan::query()
            ->where('status', 'Selesai')
            ->whereIn('kategori', [
                'Fasilitas Kampus',
                'Akademik',
                'Pelayanan',
                'Kebersihan',
                'Teknologi Informasi',
            ])
            ->selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        $completedByCategory = collect([
            'Fasilitas Kampus',
            'Akademik',
            'Pelayanan',
            'Kebersihan',
            'Teknologi Informasi',
        ])->map(fn (string $category): array => [
            'category' => $category,
            'total' => (int) ($categoryCounts[$category] ?? 0),
        ]);

        $announcements = PengumumanTindakLanjut::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->limit(10)
            ->get();

        return view('transparansi', compact(
            'totalReports',
            'completedReports',
            'resolutionRate',
            'completedByCategory',
            'announcements'
        ));
    }
}
