<?php

namespace Tests\Feature;

use App\Models\Pengaduan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class PengaduanTimelineTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_report_starts_with_a_sent_timeline_event(): void
    {
        $this->post('/pengaduan', [
            'nama' => 'Mahasiswa',
            'nim' => '09000000001',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Lampu kelas mati',
            'isi' => 'Lampu kelas perlu diperbaiki.',
        ])->assertRedirect(route('pengaduan'));

        $pengaduan = Pengaduan::firstOrFail();

        $this->assertSame('Dikirim', $pengaduan->status);
        $this->assertDatabaseHas('pengaduan_status_histories', [
            'pengaduan_id' => $pengaduan->id,
            'status' => 'Dikirim',
            'note' => null,
        ]);
    }

    public function test_admin_can_advance_one_stage_with_a_follow_up_note(): void
    {
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000001',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Lampu kelas mati',
            'isi' => 'Lampu kelas perlu diperbaiki.',
            'status' => 'Dikirim',
        ]);
        $pengaduan->statusHistories()->create(['status' => 'Dikirim']);

        $this->withSession(['admin_login' => true])
            ->post(route('admin.pengaduan.status', $pengaduan->id), [
            'status' => 'Diverifikasi',
            'note' => 'Laporan telah diverifikasi oleh admin.',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertDatabaseHas('pengaduans', [
            'id' => $pengaduan->id,
            'status' => 'Diverifikasi',
        ]);
        $this->assertDatabaseHas('pengaduan_status_histories', [
            'pengaduan_id' => $pengaduan->id,
            'status' => 'Diverifikasi',
            'note' => 'Laporan telah diverifikasi oleh admin.',
        ]);
    }

    public function test_admin_cannot_skip_a_stage(): void
    {
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000001',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Lampu kelas mati',
            'isi' => 'Lampu kelas perlu diperbaiki.',
            'status' => 'Dikirim',
        ]);

        $this->withSession(['admin_login' => true])
            ->from(route('admin.dashboard'))
            ->post(route('admin.pengaduan.status', $pengaduan->id), [
                'status' => 'Diproses',
                'note' => 'Laporan sedang dikerjakan.',
            ])
            ->assertRedirect(route('admin.dashboard'))
            ->assertSessionHasErrors('status');

        $this->assertDatabaseHas('pengaduans', [
            'id' => $pengaduan->id,
            'status' => 'Dikirim',
        ]);
        $this->assertDatabaseCount('pengaduan_status_histories', 0);
    }

    public function test_only_admin_can_update_a_complaint_status(): void
    {
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000001',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Lampu kelas mati',
            'isi' => 'Lampu kelas perlu diperbaiki.',
            'status' => 'Dikirim',
        ]);

        $this->post(route('admin.pengaduan.status', $pengaduan->id), [
            'status' => 'Diverifikasi',
            'note' => 'Laporan telah diverifikasi oleh admin.',
        ])->assertRedirect(route('admin.login'));

        $this->assertDatabaseHas('pengaduans', [
            'id' => $pengaduan->id,
            'status' => 'Dikirim',
        ]);
    }

    public function test_student_can_see_status_history_and_admin_notes_by_nim(): void
    {
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000001',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Lampu kelas mati',
            'isi' => 'Lampu kelas perlu diperbaiki.',
            'status' => 'Diverifikasi',
        ]);
        $sent = $pengaduan->statusHistories()->create(['status' => 'Dikirim']);
        $sent->created_at = '2026-10-01 08:00:00';
        $sent->save();

        $verified = $pengaduan->statusHistories()->create([
            'status' => 'Diverifikasi',
            'note' => 'Laporan telah diverifikasi oleh admin.',
        ]);
        $verified->created_at = '2026-10-02 09:30:00';
        $verified->save();

        $this->post('/cek-status', ['nim' => '09000000001'])
            ->assertOk()
            ->assertSee('Perjalanan Laporan')
            ->assertSee('Dikirim')
            ->assertSee('Diverifikasi')
            ->assertSee('Catatan tindak lanjut admin')
            ->assertSee('Laporan telah diverifikasi oleh admin.')
            ->assertSee('02/10/2026 16:30');
    }

    public function test_student_can_submit_a_supported_evidence_file(): void
    {
        Storage::fake('local');

        $this->post('/pengaduan', [
            'nama' => 'Mahasiswa',
            'nim' => '09000000002',
            'kategori' => 'Teknologi Informasi',
            'judul' => 'Wi-Fi tidak berfungsi',
            'isi' => 'Jaringan Wi-Fi di gedung tidak dapat digunakan.',
            'bukti' => UploadedFile::fake()->create('screenshot.pdf', 100, 'application/pdf'),
        ])->assertRedirect(route('pengaduan'));

        $pengaduan = Pengaduan::where('nim', '09000000002')->firstOrFail();

        $this->assertNotNull($pengaduan->evidence_path);
        Storage::disk('local')->assertExists($pengaduan->evidence_path);
    }

    public function test_student_cannot_submit_an_unsupported_evidence_file(): void
    {
        Storage::fake('local');

        $this->from('/pengaduan')
            ->post('/pengaduan', [
                'nama' => 'Mahasiswa',
                'nim' => '09000000003',
                'kategori' => 'Kebersihan',
                'judul' => 'Sampah menumpuk',
                'isi' => 'Mohon dibersihkan.',
                'bukti' => UploadedFile::fake()->create('payload.exe', 100, 'application/octet-stream'),
            ])
            ->assertRedirect('/pengaduan')
            ->assertSessionHasErrors('bukti');

        $this->assertDatabaseMissing('pengaduans', ['nim' => '09000000003']);
    }

    public function test_evidence_download_requires_a_valid_temporary_signature(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('pengaduan-bukti/evidence.pdf', 'sample evidence');
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000004',
            'kategori' => 'Akademik',
            'judul' => 'Jadwal kuliah',
            'isi' => 'Jadwal kuliah belum tersedia.',
            'evidence_path' => 'pengaduan-bukti/evidence.pdf',
            'status' => 'Dikirim',
        ]);

        $url = URL::temporarySignedRoute(
            'pengaduan.evidence',
            now()->addMinutes(30),
            ['pengaduan' => $pengaduan->id]
        );

        $this->get($url)->assertOk();
        $this->get(route('pengaduan.evidence', $pengaduan->id))->assertForbidden();
    }

    public function test_admin_can_search_reports_by_nim_or_category_and_filter_status(): void
    {
        $target = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000005',
            'kategori' => 'Kebersihan',
            'judul' => 'Kebersihan gedung',
            'isi' => 'Laporan target untuk pencarian.',
            'status' => 'Diverifikasi',
        ]);
        $target->statusHistories()->create([
            'status' => 'Dikirim',
            'note' => null,
        ]);
        $target->statusHistories()->create([
            'status' => 'Diverifikasi',
            'note' => 'Sedang diperiksa.',
        ]);

        Pengaduan::create([
            'nama' => 'Mahasiswa Lain',
            'nim' => '09000000006',
            'kategori' => 'Akademik',
            'judul' => 'Jadwal kuliah',
            'isi' => 'Laporan lain.',
            'status' => 'Dikirim',
        ]);

        $this->withSession(['admin_login' => true])
            ->get(route('admin.dashboard', [
                'search' => '09000000005',
                'status_filter' => 'Diverifikasi',
            ]))
            ->assertOk()
            ->assertSee('Kebersihan gedung')
            ->assertDontSee('Jadwal kuliah')
            ->assertSee('Laporan target untuk pencarian.')
            ->assertSee('Sedang diperiksa.');

        $this->withSession(['admin_login' => true])
            ->get(route('admin.dashboard', ['search' => 'Kebersihan']))
            ->assertOk()
            ->assertSee('Kebersihan gedung')
            ->assertDontSee('Jadwal kuliah');
    }

    public function test_admin_can_complete_a_report_with_a_resolution_note(): void
    {
        $pengaduan = Pengaduan::create([
            'nama' => 'Mahasiswa',
            'nim' => '09000000007',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Kursi rusak',
            'isi' => 'Kursi kelas perlu diperbaiki.',
            'status' => 'Diproses',
        ]);

        $response = $this->withSession(['admin_login' => true])
            ->post(route('admin.pengaduan.status', $pengaduan->id), [
                'status' => 'Selesai',
                'note' => 'Kursi sudah diperbaiki.',
                'search' => '09000000007',
                'status_filter' => 'Diproses',
            ]);

        $response->assertRedirect(route('admin.dashboard', [
            'search' => '09000000007',
            'status_filter' => 'Diproses',
        ]));

        $this->assertDatabaseHas('pengaduans', [
            'id' => $pengaduan->id,
            'status' => 'Selesai',
        ]);
        $this->assertDatabaseHas('pengaduan_status_histories', [
            'pengaduan_id' => $pengaduan->id,
            'status' => 'Selesai',
            'note' => 'Kursi sudah diperbaiki.',
        ]);
    }
}
