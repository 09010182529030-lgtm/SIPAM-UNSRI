<?php

namespace Tests\Feature;

use App\Models\Aspirasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AspirasiSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_aspirasi_submission_is_saved_and_redirects_with_confirmation(): void
    {
        $this->post(route('aspirasi.store'), [
            'nama' => 'Mahasiswa Contoh',
            'judul' => 'Perbaikan ruang belajar',
            'isi' => 'Mohon menambah fasilitas ruang belajar.',
        ])
            ->assertRedirect(route('aspirasi'))
            ->assertSessionHas('success', 'Aspirasi berhasil dikirim!');

        $this->assertDatabaseHas('aspirasis', [
            'nama' => 'Mahasiswa Contoh',
            'nim' => null,
            'kategori' => null,
            'judul' => 'Perbaikan ruang belajar',
            'isi' => 'Mohon menambah fasilitas ruang belajar.',
            'status' => 'Menunggu',
        ]);

        $this->assertSame(1, Aspirasi::count());

        $this->withSession(['admin_login' => true])
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Mahasiswa Contoh')
            ->assertSee('Umum')
            ->assertSee('Perbaikan ruang belajar');
    }

    public function test_aspirasi_submission_requires_name_title_and_content(): void
    {
        $this->from(route('aspirasi'))
            ->post(route('aspirasi.store'), [])
            ->assertRedirect(route('aspirasi'))
            ->assertSessionHasErrors(['nama', 'judul', 'isi']);

        $this->assertDatabaseCount('aspirasis', 0);
    }

    public function test_aspirasi_submission_saves_optional_nim(): void
    {
        $this->post(route('aspirasi.store'), [
            'nama' => 'Mahasiswa Contoh',
            'nim' => '09011282327001',
            'judul' => 'Perbaikan ruang belajar',
            'isi' => 'Mohon menambah fasilitas ruang belajar.',
        ])
            ->assertRedirect(route('aspirasi'))
            ->assertSessionHas('success', 'Aspirasi berhasil dikirim!');

        $this->assertDatabaseHas('aspirasis', [
            'nama' => 'Mahasiswa Contoh',
            'nim' => '09011282327001',
        ]);

        $this->withSession(['admin_login' => true])
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertDontSee('NIM: 09011282327001');
    }
}
