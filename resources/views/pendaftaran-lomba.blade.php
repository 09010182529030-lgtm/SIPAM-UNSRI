<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba | SIPAM UNSRI</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: #f3f7fc;
            color: #142b55;
            font-family: Arial, Helvetica, sans-serif;
        }

        nav {
            min-height: 78px;
            padding: 12px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: linear-gradient(110deg, #08265f, #0c3475);
            color: white;
            box-shadow: 0 8px 24px rgba(5, 31, 78, .18);
            position: relative;
            z-index: 2;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            flex: 0 0 48px;
            padding: 4px;
            border-radius: 12px;
            background: white;
            object-fit: contain;
        }

        .brand-title {
            font-size: 17px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .brand-subtitle {
            margin-top: 5px;
            color: #ffc928;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px 22px;
        }

        .nav-menu a {
            color: white;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: color .2s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #ffc928;
        }

        .nav-menu .admin-btn {
            padding: 11px 17px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffda61, #ffc21b);
            color: #08265f;
        }

        .nav-menu .admin-btn:hover {
            color: #08265f;
        }

        .hero {
            position: relative;
            min-height: 340px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(105deg, rgba(5, 31, 78, .94), rgba(11, 55, 125, .84)),
                url("{{ asset('images/unsri-campus.jpg') }}") center/cover;
        }

        .hero::before {
            position: absolute;
            top: -100px;
            right: -80px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 201, 40, .12);
            content: "";
        }

        .hero-content {
            position: relative;
            z-index: 1;
            width: 84%;
            max-width: 1120px;
            margin: auto;
            color: white;
        }

        .badge {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 17px;
            border: 1px solid rgba(255, 201, 40, .5);
            border-radius: 30px;
            background: rgba(255, 255, 255, .08);
            color: #ffc928;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        .hero h1 {
            margin-bottom: 17px;
            font-size: clamp(38px, 4vw, 54px);
            letter-spacing: -1.2px;
            line-height: 1.1;
        }

        .hero h1 span {
            color: #ffc928;
        }

        .hero p {
            max-width: 700px;
            color: #e5edff;
            font-size: 17px;
            line-height: 1.7;
        }

        .content {
            position: relative;
            z-index: 1;
            width: 84%;
            max-width: 1000px;
            margin: -50px auto 76px;
        }

        .content-card {
            padding: 34px;
            border: 1px solid rgba(21, 72, 130, .07);
            border-radius: 26px;
            background: white;
            box-shadow: 0 22px 55px rgba(17, 43, 85, .15);
        }

        .content-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            flex: 0 0 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 17px;
            background: linear-gradient(135deg, #eaf1ff, #dce9ff);
            font-size: 28px;
        }

        .content-header h2 {
            color: #08265f;
            font-size: 27px;
            letter-spacing: -.4px;
        }

        .content-header p {
            margin-top: 5px;
            color: #7184a2;
            font-size: 14px;
        }

        .info-box {
            margin-bottom: 20px;
            padding: 15px 17px;
            border: 1px solid rgba(255, 201, 40, .28);
            border-left: 4px solid #ffc928;
            border-radius: 12px;
            background: #fff8e3;
            color: #655522;
            font-size: 14px;
            line-height: 1.6;
        }

        .empty-state {
            padding: 22px;
            border: 1px dashed #c9d6e8;
            border-radius: 14px;
            background: #f8faff;
            color: #536b8d;
            line-height: 1.7;
            text-align: center;
        }

        .competition-list {
            display: grid;
            gap: 14px;
        }

        .competition-item {
            padding: 18px;
            border: 1px solid #e3ebf4;
            border-radius: 14px;
            background: #fbfdff;
        }

        .competition-item h3 {
            color: #123e6c;
            font-size: 18px;
        }

        .competition-organizer {
            margin-top: 5px;
            color: #71849b;
            font-size: 13px;
            font-weight: 700;
        }

        .competition-description {
            margin-top: 12px;
            color: #526982;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-line;
        }

        .competition-period {
            display: block;
            margin-top: 12px;
            color: #55708d;
            font-size: 12px;
            font-weight: 700;
        }

        .registration-link {
            display: inline-flex;
            margin-top: 14px;
            padding: 10px 14px;
            border-radius: 9px;
            background: #092f6b;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s ease;
        }

        .registration-link:hover,
        .registration-link:focus-visible {
            background: #0879cc;
        }

        footer {
            padding: 28px 7%;
            background: linear-gradient(110deg, #061d49, #092f6b);
            color: #cbd6eb;
            font-size: 13px;
            text-align: center;
        }

        footer strong {
            color: #ffc928;
        }

        @media (max-width: 850px) {
            nav {
                padding: 12px 4%;
            }

            .nav-menu {
                gap: 10px 14px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .brand-title {
                font-size: 13px;
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 15px 5%;
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .brand {
                min-width: 0;
            }

            .brand-title {
                font-size: 13px;
                overflow-wrap: anywhere;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .nav-menu {
                justify-content: center;
                gap: 6px 10px;
            }

            .nav-menu a {
                min-height: 40px;
                padding: 8px 6px;
                display: inline-flex;
                align-items: center;
            }

            .hero {
                min-height: 330px;
            }

            .hero-content {
                width: 90%;
            }

            .hero h1 {
                font-size: clamp(29px, 8vw, 36px);
            }

            .hero p {
                font-size: 15px;
            }

            .badge {
                padding: 8px 12px;
                font-size: 10px;
            }

            .content {
                width: 92%;
                margin-top: -42px;
                margin-bottom: 48px;
            }

            .content-card {
                padding: 24px 18px;
                border-radius: 20px;
            }

            .content-header {
                align-items: flex-start;
                gap: 12px;
            }

            .content-header h2 {
                font-size: 22px;
            }

            .icon-box {
                width: 48px;
                height: 48px;
                flex-basis: 48px;
                font-size: 23px;
            }

            .info-box,
            .empty-state {
                padding: 14px;
            }

            footer {
                padding: 22px 16px;
                line-height: 1.6;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/sipam-theme.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Universitas Sriwijaya" class="brand-logo">
            <div>
                <div class="brand-title">Sistem Pengaduan & Aspirasi Mahasiswa</div>
                <div class="brand-subtitle">UNIVERSITAS SRIWIJAYA</div>
            </div>
        </a>

        <div class="nav-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('pengaduan') }}">Pengaduan</a>
            <a href="{{ route('aspirasi') }}">Aspirasi</a>
            <a href="{{ route('lomba.index') }}" class="active" aria-current="page">Pendaftaran Lomba</a>
            <a href="{{ route('cek.status') }}">Cek Status</a>
            <a href="{{ route('transparansi') }}">Transparansi</a>
            <a href="{{ route('admin.login') }}" class="admin-btn">Admin</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="badge">KEGIATAN MAHASISWA UNSRI</div>
            <h1>Jelajahi Lomba,<br><span>Tunjukkan Prestasimu.</span></h1>
            <p>
                Temukan informasi lomba yang dibuka untuk mahasiswa Universitas Sriwijaya,
                termasuk detail dan periode pendaftarannya.
            </p>
        </div>
    </section>

    <main class="content">
        <section class="content-card" aria-labelledby="competition-title">
            <div class="content-header">
                <div class="icon-box" aria-hidden="true">🏆</div>
                <div>
                    <h2 id="competition-title">Daftar Lomba</h2>
                    <p>Informasi lomba dan pendaftaran mahasiswa.</p>
                </div>
            </div>

            <div class="info-box">
                <strong>Informasi:</strong>
                Lomba yang sedang dibuka akan ditampilkan di halaman ini beserta periode pendaftarannya.
            </div>

            @if($lombas->isEmpty())
                <div class="empty-state" role="status">
                    Belum ada lomba yang tersedia saat ini. Silakan cek kembali nanti.
                </div>
            @else
                <div class="competition-list">
                    @foreach($lombas as $lomba)
                        <article class="competition-item">
                            <h3>{{ $lomba->title }}</h3>
                            <p class="competition-organizer">Penyelenggara: {{ $lomba->organizer }}</p>
                            <p class="competition-description">{{ $lomba->description }}</p>
                            <time class="competition-period">
                                Periode pendaftaran:
                                {{ $lomba->registration_start->format('d/m/Y') }}
                                – {{ $lomba->registration_end->format('d/m/Y') }}
                            </time>
                            @if($lomba->registration_url)
                                <a
                                    class="registration-link"
                                    href="{{ $lomba->registration_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Daftar lomba
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    <footer>
        <strong>SIPAM UNSRI</strong> &copy; {{ date('Y') }} — Universitas Sriwijaya
    </footer>
</body>
</html>
