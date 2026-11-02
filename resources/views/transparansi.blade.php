<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparansi & Tindak Lanjut | SIPAM UNSRI</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            background: #f3f7fc;
            color: #17375e;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topbar {
            background: #092f6b;
            color: white;
        }

        .topbar-inner {
            width: min(1120px, 90%);
            min-height: 76px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: white;
            text-decoration: none;
        }

        .brand img {
            width: 60px;
            height: 60px;
            flex: 0 0 60px;
            border-radius: 14px;
            object-fit: contain;
            background: white;
        }

        .brand-text {
            line-height: 1.15;
        }

        .brand-title {
            display: block;
            font-size: 17px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .brand-subtitle {
            display: block;
            margin-top: 5px;
            color: #ffc328;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .navigation {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px 30px;
        }

        .navigation a {
            color: white;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
        }

        .navigation a:hover,
        .navigation a[aria-current="page"] {
            color: #ffc328;
        }

        .navigation .admin-btn {
            padding: 11px 19px;
            border-radius: 12px;
            color: #08265f;
            background: linear-gradient(135deg, #ffda61, #ffc21b);
            box-shadow: 0 8px 18px rgba(255, 201, 40, .2);
        }

        .navigation .admin-btn:hover {
            color: #08265f;
            transform: translateY(-2px);
        }

        .hero {
            padding: 54px 5%;
            background: linear-gradient(120deg, #08265f, #0872c7);
            color: white;
        }

        .hero-inner,
        main {
            width: min(1050px, 90%);
            margin: auto;
        }

        .eyebrow {
            color: #ffc328;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .12em;
        }

        .hero h1 {
            margin-top: 12px;
            font-size: clamp(30px, 5vw, 44px);
        }

        .hero p {
            max-width: 720px;
            margin-top: 12px;
            color: #e6efff;
            line-height: 1.7;
        }

        main {
            padding: 30px 0 64px;
        }

        .privacy-note {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #b8e7c8;
            border-radius: 14px;
            background: #e8f8ef;
            color: #176c43;
            font-size: 13px;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card,
        .panel {
            border: 1px solid #e5ebf3;
            border-radius: 18px;
            background: white;
            box-shadow: 0 10px 28px rgba(18, 50, 91, .06);
        }

        .stat-card {
            padding: 22px;
        }

        .stat-card span {
            display: block;
            color: #71849b;
            font-size: 13px;
            font-weight: 700;
        }

        .stat-card strong {
            display: block;
            margin-top: 9px;
            color: #083d78;
            font-size: 34px;
        }

        .panel {
            margin-top: 22px;
            padding: 24px;
        }

        .panel h2 {
            color: #083d78;
            font-size: 21px;
        }

        .panel-intro {
            margin-top: 6px;
            color: #7b8da3;
            font-size: 13px;
            line-height: 1.6;
        }

        .category-list {
            display: grid;
            gap: 18px;
            margin-top: 24px;
        }

        .category-row {
            display: grid;
            grid-template-columns: minmax(130px, 210px) minmax(60px, 1fr) 34px;
            align-items: center;
            gap: 12px;
        }

        .category-name {
            color: #294b70;
            font-size: 13px;
            font-weight: 700;
        }

        .bar-track {
            height: 12px;
            overflow: hidden;
            border-radius: 99px;
            background: #edf2f8;
        }

        .bar-fill {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #0872c7, #0ca678);
        }

        .category-total {
            color: #083d78;
            font-size: 14px;
            font-weight: 800;
            text-align: right;
        }

        .announcement-list {
            display: grid;
            gap: 14px;
            margin-top: 20px;
        }

        .announcement {
            padding: 18px;
            border-left: 4px solid #0872c7;
            border-radius: 10px;
            background: #f7faff;
        }

        .announcement time {
            color: #71849b;
            font-size: 12px;
        }

        .announcement h3 {
            margin-top: 7px;
            color: #123e6c;
            font-size: 16px;
        }

        .announcement p {
            margin-top: 8px;
            color: #526982;
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .empty {
            margin-top: 18px;
            padding: 18px;
            border-radius: 10px;
            background: #f7faff;
            color: #71849b;
            font-size: 14px;
        }

        footer {
            padding: 22px 5%;
            background: #061d49;
            color: #d2def1;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 650px) {
            .topbar-inner {
                align-items: center;
                flex-direction: column;
                padding: 16px 0;
            }

            .brand {
                align-self: flex-start;
            }

            .brand-title {
                font-size: 14px;
            }

            .navigation {
                align-self: stretch;
                gap: 10px 16px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 18px;
            }

            .stat-card strong {
                font-size: 30px;
            }

            .panel {
                padding: 19px 16px;
            }

            .category-row {
                grid-template-columns: minmax(0, 1fr) 34px;
                gap: 8px 12px;
            }

            .category-name {
                grid-column: 1 / -1;
            }

            .bar-track {
                grid-column: 1;
            }

            .category-total {
                grid-column: 2;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/sipam-theme.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Universitas Sriwijaya" width="60" height="60">
                <span class="brand-text">
                    <span class="brand-title">Sistem Pengaduan &amp; Aspirasi Mahasiswa</span>
                    <span class="brand-subtitle">UNIVERSITAS SRIWIJAYA</span>
                </span>
            </a>
            <nav class="navigation" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('pengaduan') }}">Pengaduan</a>
                <a href="{{ route('aspirasi') }}">Aspirasi</a>
                <a href="{{ route('cek.status') }}">Cek Status</a>
                <a href="{{ route('transparansi') }}" aria-current="page">Transparansi</a>
                <a href="{{ route('admin.login') }}" class="admin-btn">Admin</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-inner">
            <span class="eyebrow">AKUNTABILITAS LAYANAN MAHASISWA</span>
            <p>
                Lihat ringkasan penyelesaian pengaduan dan pengumuman tindak lanjut.
                Informasi ditampilkan dalam bentuk agregat untuk menjaga privasi pelapor.
            </p>
        </div>
    </section>

    <main>
        <p class="privacy-note">
            <strong>Privasi terjaga.</strong>
            Halaman ini tidak menampilkan nama, NIM, isi laporan, bukti, atau catatan privat pengaduan.
        </p>

        <section class="stats" aria-label="Statistik penyelesaian pengaduan">
            <article class="stat-card">
                <span class="transparency-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h4"/></svg></span>
                <span>Total pengaduan</span>
                <strong>{{ number_format($totalReports, 0, ',', '.') }}</strong>
            </article>
            <article class="stat-card">
                <span class="transparency-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="m8 12 2.5 2.5L16 9"/></svg></span>
                <span>Pengaduan selesai</span>
                <strong>{{ number_format($completedReports, 0, ',', '.') }}</strong>
            </article>
            <article class="stat-card">
                <span class="transparency-stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19V5M4 19h17"/><path d="m7 15 4-4 3 2 6-7"/></svg></span>
                <span>Tingkat penyelesaian</span>
                <strong>{{ $resolutionRate }}%</strong>
            </article>
        </section>

        <section class="panel" aria-labelledby="category-title">
            <h2 id="category-title">Pengaduan selesai per kategori</h2>
            <p class="panel-intro">
                Jumlah laporan selesai ditampilkan secara agregat, tanpa rincian laporan atau identitas pelapor.
            </p>
            <div class="category-list">
                @foreach($completedByCategory as $item)
                    @php
                        $barWidth = $completedReports > 0
                            ? ($item['total'] / $completedReports) * 100
                            : 0;
                    @endphp
                    <div class="category-row">
                        <span class="category-name">{{ $item['category'] }}</span>
                        <div
                            class="bar-track"
                            role="progressbar"
                            aria-label="Pengaduan selesai kategori {{ $item['category'] }}"
                            aria-valuemin="0"
                            aria-valuemax="{{ $completedReports }}"
                            aria-valuenow="{{ $item['total'] }}"
                        >
                            <div class="bar-fill" style="width: {{ $barWidth }}%"></div>
                        </div>
                        <span class="category-total">{{ $item['total'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="panel" aria-labelledby="announcements-title">
            <h2 id="announcements-title">Pengumuman tindak lanjut</h2>
            <p class="panel-intro">
                Pembaruan umum yang dipublikasikan oleh administrator.
            </p>

            @if($announcements->isNotEmpty())
                <div class="announcement-list">
                    @foreach($announcements as $announcement)
                        <article class="announcement">
                            <time datetime="{{ $announcement->published_at->toIso8601String() }}">
                                {{ $announcement->published_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB
                            </time>
                            <h3>{{ $announcement->title }}</h3>
                            <p>{{ $announcement->body }}</p>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="empty">Belum ada pengumuman tindak lanjut yang dipublikasikan.</p>
            @endif
        </section>
    </main>

    <footer>© {{ date('Y') }} Sistem Pengaduan & Aspirasi Mahasiswa — Universitas Sriwijaya</footer>
</body>
</html>
