<?php

namespace Tests\Feature;

use App\Models\Pengaduan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransparansiTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_transparency_page_only_shows_aggregate_report_data(): void
    {
        $completed = Pengaduan::create([
            'nama' => 'Nama Rahasia Mahasiswa',
            'nim' => '09123456789',
            'kategori' => 'Fasilitas Kampus',
            'judul' => 'Detail laporan yang rahasia',
            'isi' => 'Isi laporan yang tidak boleh ditampilkan ke publik.',
            'status' => 'Selesai',
        ]);
        $completed->statusHistories()->create([
            'status' => 'Selesai',
            'note' => 'Catatan internal yang sangat rahasia.',
        ]);

        Pengaduan::create([
            'nama' => 'Mahasiswa Lain',
            'nim' => '09999999999',
            'kategori' => 'Akademik',
            'judul' => 'Masih diproses',
            'isi' => 'Laporan kedua.',
            'status' => 'Diproses',
        ]);

        $this->get(route('transparansi'))
            ->assertOk()
            ->assertSee('Total pengaduan')
            ->assertSee('Pengaduan selesai')
            ->assertSee('Tingkat penyelesaian')
            ->assertSee('Fasilitas Kampus')
            ->assertSee('class="category-total">1</span>', false)
            ->assertSee('50%')
            ->assertDontSee('Nama Rahasia Mahasiswa')
            ->assertDontSee('09123456789')
            ->assertDontSee('Detail laporan yang rahasia')
            ->assertDontSee('Isi laporan yang tidak boleh ditampilkan ke publik.')
            ->assertDontSee('Catatan internal yang sangat rahasia.');
    }

    public function test_public_transparency_page_handles_no_reports_and_shows_published_announcements(): void
    {
        $this->withSession(['admin_login' => true])
            ->post(route('admin.pengumuman.store'), [
                'title' => 'Pembaruan layanan fasilitas',
                'body' => 'Perbaikan fasilitas umum dilanjutkan pekan ini.',
            ])
            ->assertRedirect(route('admin.dashboard', ['section' => 'announcements']));

        $this->get(route('transparansi'))
            ->assertOk()
            ->assertSee('0%')
            ->assertSee('Pembaruan layanan fasilitas')
            ->assertSee('Perbaikan fasilitas umum dilanjutkan pekan ini.')
            ->assertDontSee('09123456789');
    }

    public function test_only_authenticated_admin_can_publish_or_delete_announcements(): void
    {
        $this->post(route('admin.pengumuman.store'), [
            'title' => 'Pengumuman tanpa admin',
            'body' => 'Konten.',
        ])->assertRedirect(route('admin.login'));

        $this->assertDatabaseCount('pengumuman_tindak_lanjuts', 0);

        $this->withSession(['admin_login' => true])
            ->post(route('admin.pengumuman.store'), [
                'title' => 'Pengumuman admin',
                'body' => 'Pembaruan umum.',
            ])
            ->assertRedirect(route('admin.dashboard', ['section' => 'announcements']));

        $announcementId = \App\Models\PengumumanTindakLanjut::firstOrFail()->id;

        $this->flushSession()
            ->delete(route('admin.pengumuman.destroy', $announcementId))
            ->assertRedirect(route('admin.login'));

        $this->assertDatabaseCount('pengumuman_tindak_lanjuts', 1);

        $this->withSession(['admin_login' => true])
            ->delete(route('admin.pengumuman.destroy', $announcementId))
            ->assertRedirect(route('admin.dashboard', ['section' => 'announcements']));

        $this->assertDatabaseCount('pengumuman_tindak_lanjuts', 0);
    }
}
