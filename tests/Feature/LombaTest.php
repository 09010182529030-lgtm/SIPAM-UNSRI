<?php

namespace Tests\Feature;

use App\Models\Lomba;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LombaTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_a_competition_and_it_appears_on_the_public_page(): void
    {
        $this->withSession(['admin_login' => true])
            ->post(route('admin.lomba.store'), [
                'title' => 'Lomba Inovasi Mahasiswa',
                'organizer' => 'Universitas Sriwijaya',
                'description' => 'Kompetisi inovasi tingkat universitas.',
                'registration_start' => today()->toDateString(),
                'registration_end' => today()->addDays(14)->toDateString(),
                'registration_url' => 'https://example.com/register',
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.dashboard', ['section' => 'lombas']));

        $this->assertDatabaseHas('lombas', [
            'title' => 'Lomba Inovasi Mahasiswa',
            'organizer' => 'Universitas Sriwijaya',
            'is_active' => true,
        ]);

        $this->get(route('lomba.index'))
            ->assertOk()
            ->assertSee('Lomba Inovasi Mahasiswa')
            ->assertSee('Universitas Sriwijaya')
            ->assertSee('Kompetisi inovasi tingkat universitas.')
            ->assertSee('https://example.com/register');
    }

    public function test_public_page_only_shows_active_competitions_that_have_not_ended(): void
    {
        Lomba::create([
            'title' => 'Lomba Aktif',
            'organizer' => 'Penyelenggara',
            'description' => 'Masih dibuka.',
            'registration_start' => today(),
            'registration_end' => today()->addDays(5),
            'is_active' => true,
        ]);

        Lomba::create([
            'title' => 'Lomba Nonaktif',
            'organizer' => 'Penyelenggara',
            'description' => 'Disembunyikan.',
            'registration_start' => today(),
            'registration_end' => today()->addDays(5),
            'is_active' => false,
        ]);

        Lomba::create([
            'title' => 'Lomba Kedaluwarsa',
            'organizer' => 'Penyelenggara',
            'description' => 'Sudah lewat.',
            'registration_start' => today()->subDays(10),
            'registration_end' => today()->subDay(),
            'is_active' => true,
        ]);

        $this->get(route('lomba.index'))
            ->assertOk()
            ->assertSee('Lomba Aktif')
            ->assertDontSee('Lomba Nonaktif')
            ->assertDontSee('Lomba Kedaluwarsa');
    }

    public function test_only_admin_can_add_or_delete_competitions(): void
    {
        $data = [
            'title' => 'Lomba Admin',
            'organizer' => 'Penyelenggara',
            'description' => 'Deskripsi.',
            'registration_start' => today()->toDateString(),
            'registration_end' => today()->addDay()->toDateString(),
        ];

        $this->post(route('admin.lomba.store'), $data)
            ->assertRedirect(route('admin.login'));
        $this->assertDatabaseCount('lombas', 0);

        $this->withSession(['admin_login' => true])
            ->post(route('admin.lomba.store'), $data)
            ->assertRedirect(route('admin.dashboard', ['section' => 'lombas']));

        $lomba = Lomba::firstOrFail();

        $this->flushSession()
            ->delete(route('admin.lomba.destroy', $lomba))
            ->assertRedirect(route('admin.login'));
        $this->assertDatabaseCount('lombas', 1);

        $this->withSession(['admin_login' => true])
            ->delete(route('admin.lomba.destroy', $lomba))
            ->assertRedirect(route('admin.dashboard', ['section' => 'lombas']));
        $this->assertDatabaseCount('lombas', 0);
    }

    public function test_competition_end_date_must_not_precede_start_date(): void
    {
        $this->withSession(['admin_login' => true])
            ->from(route('admin.dashboard'))
            ->post(route('admin.lomba.store'), [
                'title' => 'Lomba Salah Periode',
                'organizer' => 'Penyelenggara',
                'description' => 'Deskripsi.',
                'registration_start' => today()->toDateString(),
                'registration_end' => today()->subDay()->toDateString(),
            ])
            ->assertSessionHasErrors('registration_end');

        $this->assertDatabaseCount('lombas', 0);
    }
}
