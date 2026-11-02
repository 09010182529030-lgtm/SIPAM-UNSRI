<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Aspirasi;
use App\Models\PengumumanTindakLanjut;
use App\Models\Lomba;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = 'admin';
        $password = 'admin123';

        if (
            $request->username === $username &&
            $request->password === $password
        ) {
            session([
                'admin_login' => true,
                'admin_username' => $request->username
            ]);

            return redirect('/admin')
                ->with('success', 'Login berhasil.');
        }

        return back()
            ->withInput()
            ->with('error', 'Username atau password salah.');
    }

    public function index(Request $request)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $allPengaduan = Pengaduan::latest()->get();
        $aspirasi = Aspirasi::latest()->get();
        $announcements = PengumumanTindakLanjut::latest()->get();
        $lombas = Lomba::query()->orderByDesc('created_at')->get();

        $statistics = [
            'incoming' => $allPengaduan->whereIn('status', ['Menunggu', 'Dikirim'])->count(),
            'processing' => $allPengaduan->where('status', 'Diproses')->count(),
            'completed' => $allPengaduan->where('status', 'Selesai')->count(),
            'aspirations' => $aspirasi->count(),
        ];

        $chartData = [
            ['label' => 'Pengaduan Masuk', 'value' => $statistics['incoming'], 'key' => 'incoming'],
            ['label' => 'Pengaduan Diproses', 'value' => $statistics['processing'], 'key' => 'processing'],
            ['label' => 'Pengaduan Selesai', 'value' => $statistics['completed'], 'key' => 'completed'],
            ['label' => 'Aspirasi Mahasiswa', 'value' => $statistics['aspirations'], 'key' => 'aspirations'],
        ];

        $maxChartValue = max(array_column($chartData, 'value')) ?: 1;
        $filters = $request->validate([
            'search' => 'nullable|string|max:100',
            'status_filter' => 'nullable|in:Menunggu,Dikirim,Diverifikasi,Diproses,Selesai,Ditolak',
        ]);

        $search = trim($filters['search'] ?? '');
        $statusFilter = $filters['status_filter'] ?? '';
        $pengaduanQuery = Pengaduan::with([
            'statusHistories' => fn ($query) => $query
                ->orderBy('created_at')
                ->orderBy('id'),
        ])->latest();

        if ($search !== '') {
            $pengaduanQuery->where(function ($query) use ($search): void {
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        if ($statusFilter !== '') {
            $pengaduanQuery->where('status', $statusFilter);
        }

        $pengaduan = $pengaduanQuery->get();

        return view(
            'admin.dashboard',
            compact(
                'pengaduan',
                'aspirasi',
                'announcements',
                'lombas',
                'statistics',
                'chartData',
                'maxChartValue',
                'search',
                'statusFilter'
            )
        );
    }

    public function storeAnnouncement(Request $request)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'body' => 'required|string|max:2000',
        ]);

        PengumumanTindakLanjut::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published_at' => now(),
        ]);

        return redirect()
            ->route('admin.dashboard', ['section' => 'announcements'])
            ->with('success', 'Pengumuman tindak lanjut berhasil dipublikasikan.');
    }

    public function deleteAnnouncement($id)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        PengumumanTindakLanjut::findOrFail($id)->delete();

        return redirect()
            ->route('admin.dashboard', ['section' => 'announcements'])
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function storeLomba(Request $request)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'organizer' => 'required|string|max:120',
            'description' => 'required|string|max:2000',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
            'registration_url' => 'nullable|url|max:2048',
        ]);

        Lomba::create([
            ...$validated,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.dashboard', ['section' => 'lombas'])
            ->with('success', 'Informasi lomba berhasil ditambahkan.');
    }

    public function deleteLomba($id)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        Lomba::findOrFail($id)->delete();

        return redirect()
            ->route('admin.dashboard', ['section' => 'lombas'])
            ->with('success', 'Informasi lomba berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'status' => 'required|in:Diverifikasi,Diproses,Selesai',
            'note' => 'required|string|max:1000',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $stages = ['Dikirim', 'Diverifikasi', 'Diproses', 'Selesai'];
        $currentStatus = $pengaduan->status === 'Menunggu'
            ? 'Dikirim'
            : $pengaduan->status;
        $currentStage = array_search($currentStatus, $stages, true);
        $nextStage = array_search($validated['status'], $stages, true);

        if ($currentStage === false || $nextStage !== $currentStage + 1) {
            return back()
                ->withErrors(['status' => 'Status laporan hanya dapat dilanjutkan ke tahap berikutnya.'])
                ->withInput();
        }

        DB::transaction(function () use ($pengaduan, $validated): void {
            $pengaduan->update([
                'status' => $validated['status'],
            ]);

            $pengaduan->statusHistories()->create([
                'status' => $validated['status'],
                'note' => $validated['note'],
            ]);
        });

        return redirect()
            ->route('admin.dashboard', array_filter([
                'search' => $request->input('search'),
                'status_filter' => $request->input('status_filter'),
            ], fn ($value) => $value !== null && $value !== ''))
            ->with('success', 'Status pengaduan berhasil diperbarui.');
    }

    public function logout()
    {
        session()->forget([
            'admin_login',
            'admin_username'
        ]);

        return redirect('/admin/login')
            ->with('success', 'Anda berhasil logout.');
    }
}