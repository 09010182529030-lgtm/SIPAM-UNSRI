<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Throwable;

class PengaduanController extends Controller
{
    // Menampilkan halaman pengaduan
    public function create()
    {
        return view('pengaduan');
    }

    // Menyimpan pengaduan mahasiswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kategori' => 'required|in:Fasilitas Kampus,Akademik,Pelayanan,Kebersihan,Teknologi Informasi',
            'judul' => 'required',
            'isi' => 'required',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in' => 'Kategori pengaduan tidak valid.',
            'judul.required' => 'Judul pengaduan wajib diisi.',
            'isi.required' => 'Isi pengaduan wajib diisi.',
            'bukti.file' => 'Bukti harus berupa berkas yang valid.',
            'bukti.mimes' => 'Bukti harus berupa JPG, PNG, PDF, DOC, atau DOCX.',
            'bukti.max' => 'Ukuran bukti maksimal 5 MB.',
        ]);

        $evidencePath = null;

        try {
            if ($request->hasFile('bukti')) {
                $evidencePath = Storage::disk('local')->putFile(
                    'pengaduan-bukti',
                    $request->file('bukti')
                );

                if ($evidencePath === false) {
                    throw new \RuntimeException('Bukti pengaduan gagal disimpan.');
                }
            }

            DB::transaction(function () use ($validated, $evidencePath): void {
                $pengaduan = Pengaduan::create([
                    'nama' => $validated['nama'],
                    'nim' => $validated['nim'],
                    'kategori' => $validated['kategori'],
                    'judul' => $validated['judul'],
                    'isi' => $validated['isi'],
                    'evidence_path' => $evidencePath,
                    'status' => 'Dikirim',
                ]);

                $pengaduan->statusHistories()->create([
                    'status' => 'Dikirim',
                ]);
            });
        } catch (Throwable $exception) {
            if (is_string($evidencePath)) {
                Storage::disk('local')->delete($evidencePath);
            }

            throw $exception;
        }

        return redirect()
            ->route('pengaduan')
            ->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function downloadEvidence(Pengaduan $pengaduan)
    {
        abort_unless(
            $pengaduan->evidence_path
            && Storage::disk('local')->exists($pengaduan->evidence_path),
            404
        );

        return Storage::disk('local')->download(
            $pengaduan->evidence_path,
            basename($pengaduan->evidence_path)
        );
    }

    // Mengubah status pengaduan oleh admin
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with(
                'success',
                'Status pengaduan berhasil diperbarui!'
            );
    }

    // Mengecek pengaduan berdasarkan NIM
    public function cekStatus(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        $pengaduans = Pengaduan::with([
            'statusHistories' => fn ($query) => $query
                ->orderBy('created_at')
                ->orderBy('id'),
        ])
            ->where('nim', $request->nim)
            ->latest()
            ->get();

        $stages = ['Dikirim', 'Diverifikasi', 'Diproses', 'Selesai'];

        foreach ($pengaduans as $pengaduan) {
            $currentStatus = $pengaduan->status === 'Menunggu'
                ? 'Dikirim'
                : $pengaduan->status;
            $currentStage = array_search($currentStatus, $stages, true);

            $pengaduan->setAttribute(
                'timeline',
                collect($stages)->map(function (string $status, int $index) use ($pengaduan, $currentStage): array {
                    return [
                        'status' => $status,
                        'reached' => $currentStage !== false && $index <= $currentStage,
                        'event' => $pengaduan->statusHistories->firstWhere('status', $status),
                    ];
                })
            );
        }

        return view(
            'cek-status',
            compact('pengaduans')
        );
    }
}