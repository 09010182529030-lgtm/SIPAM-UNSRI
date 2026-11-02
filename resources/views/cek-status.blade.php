<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cek Status Pengaduan | Sistem Pengaduan & Aspirasi UNSRI</title>

    <style>

        html,
        body,
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar,
        *::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fc;
            color: #102a56;
        }

        /* ================= NAVBAR ================= */

        nav {
            min-height: 82px;
            background: #06245f;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 7%;
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: white;
        }

        .brand-logo {
            width: 58px;
            height: 58px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 3px;
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 800;
            line-height: 1.2;
            color: white;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #ffd447;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* ================= MENU ================= */

        .menu {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu a:hover {
            color: #ffc629;
        }

        .menu a.active {
            color: #ffc629;
        }

        .admin-btn {
            background: #ffc629;
            color: #06245f !important;
            padding: 12px 20px;
            border-radius: 10px;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 360px;
            padding: 70px 8%;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    90deg,
                    rgba(5,35,91,0.98) 0%,
                    rgba(7,48,112,0.93) 45%,
                    rgba(7,48,112,0.65) 100%
                ),
                url('{{ asset("images/unsri-campus.jpg") }}');

            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255,198,41,0.10);
            right: -100px;
            top: -150px;
        }

        .hero-content {
            position: relative;
            max-width: 850px;
            color: white;
        }

        .label {
            display: inline-block;
            padding: 9px 16px;
            border: 1px solid rgba(255,198,41,0.6);
            border-radius: 30px;
            color: #ffd447;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 1px;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero h1 span {
            color: #ffc629;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.8;
            max-width: 700px;
            color: #e5ecfa;
        }

        /* ================= CONTENT ================= */

        .container {
            width: 90%;
            max-width: 1050px;
            margin: -55px auto 70px;
            position: relative;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 42px;
            box-shadow: 0 18px 45px rgba(10,40,90,0.12);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 30px;
        }

        .icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #e9f1ff;
            color: #1769c2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .form-header h2 {
            font-size: 27px;
            color: #06245f;
        }

        .form-header p {
            margin-top: 5px;
            color: #71809a;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
            color: #102a56;
        }

        input {
            width: 100%;
            border: 1px solid #d8dfeb;
            border-radius: 12px;
            padding: 15px 17px;
            font-size: 15px;
            outline: none;
            background: #fbfcff;
            transition: 0.25s;
        }

        input:focus {
            border-color: #1769c2;
            box-shadow: 0 0 0 4px rgba(23,105,194,0.10);
            background: white;
        }

        .hint {
            font-size: 13px;
            color: #7d899d;
            margin-top: 7px;
        }

        /* ================= BUTTON ================= */

        .submit-btn {
            width: 100%;
            border: none;
            background: linear-gradient(135deg, #ffc629, #f1ad00);
            color: #06245f;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 8px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(230,170,0,0.25);
        }

        /* ================= STATUS ================= */

        .status-list {
            margin-top: 30px;
            display: grid;
            gap: 15px;
        }

        .result-summary {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 18px;
            border: 1px solid #b8e7c8;
            border-radius: 14px;
            background: #e8f8ef;
            color: #167346;
        }

        .result-summary-icon {
            display: inline-flex;
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #c8efd7;
            font-weight: 800;
        }

        .result-summary strong {
            display: block;
            margin-bottom: 4px;
            font-size: 15px;
        }

        .result-summary p {
            color: #287752;
            font-size: 13px;
            line-height: 1.5;
        }

        .status-card {
            border: 1px solid #e0e6f0;
            border-radius: 16px;
            padding: 20px;
            background: #fbfcff;
        }

        .status-card h3 {
            color: #06245f;
            margin-bottom: 8px;
        }

        .status-card p {
            color: #71809a;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        .status-badge {
            display: inline-block;
            margin-top: 10px;
            padding: 7px 13px;
            border-radius: 20px;
            background: #fff4cc;
            color: #9a7000;
            font-weight: bold;
            font-size: 13px;
        }

        .timeline {
            margin-top: 26px;
        }

        .timeline h4 {
            color: #06245f;
            font-size: 16px;
            margin-bottom: 18px;
        }

        .timeline-list {
            list-style: none;
            padding-left: 9px;
        }

        .timeline-item {
            position: relative;
            padding: 0 0 22px 24px;
            border-left: 2px solid #dce5f0;
        }

        .timeline-item:last-child {
            border-left-color: transparent;
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            width: 12px;
            height: 12px;
            left: -7px;
            top: 3px;
            border: 2px solid white;
            border-radius: 50%;
            background: #c7d1df;
            box-shadow: 0 0 0 1px #c7d1df;
        }

        .timeline-item.is-reached::before {
            background: #0ca678;
            box-shadow: 0 0 0 1px #0ca678;
        }

        .timeline-item strong {
            display: block;
            color: #294b70;
            font-size: 14px;
        }

        .timeline-item.is-pending strong,
        .timeline-item.is-pending span {
            color: #9aa7b8;
        }

        .timeline-item time,
        .timeline-item > span {
            display: block;
            margin-top: 5px;
            color: #71809a;
            font-size: 12px;
        }

        .timeline-note {
            margin-top: 9px;
            padding: 11px 13px;
            border-radius: 10px;
            background: #f1f6fc;
            color: #526982;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .timeline-note span {
            display: block;
            margin-bottom: 3px;
            color: #294b70;
            font-size: 11px;
            font-weight: 700;
        }

        /* ================= ALERT ================= */

        .success {
            background: #e8f8ef;
            border-left: 5px solid #18a765;
            color: #167346;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error {
            background: #fff0f0;
            border-left: 5px solid #e53935;
            color: #b3261e;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .empty {
            margin-top: 20px;
            padding: 20px;
            background: #f4f7fc;
            border-radius: 14px;
            color: #71809a;
            text-align: center;
        }

        /* ================= INFO ================= */

        .info-section {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-card {
            display: block;
            background: white;
            border-radius: 17px;
            padding: 22px;
            border: 1px solid #e4e9f2;
            color: inherit;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(10,40,90,0.10);
            border-color: #cbdaf0;
        }

        .info-card:focus-visible {
            outline: 3px solid #1769c2;
            outline-offset: 4px;
        }

        .info-card .small-icon {
            font-size: 25px;
            margin-bottom: 12px;
        }

        .info-card h3 {
            color: #06245f;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .info-card p {
            color: #758197;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #061d4c;
            color: white;
            text-align: center;
            padding: 28px;
            font-size: 13px;
        }

        footer strong {
            color: #ffc629;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            body {
                width: 100%;
                overflow-x: hidden;
            }

            nav {
                padding: 12px 5%;
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .brand {
                max-width: 100%;
                min-width: 0;
            }

            .brand-text {
                min-width: 0;
            }

            .brand-logo {
                width: 46px;
                height: 46px;
            }

            .menu {
                gap: 12px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .menu a {
                font-size: 12px;
                min-height: 40px;
                padding: 8px 5px;
                display: inline-flex;
                align-items: center;
            }

            .brand-title {
                font-size: 16px;
            }

            .hero {
                padding: 55px 7%;
            }

            .hero h1 {
                font-size: 36px;
            }

            .form-card {
                padding: 25px;
            }

            .container {
                width: 92%;
                margin-top: -42px;
            }

            .hero {
                min-height: 320px;
                padding: 48px 6%;
            }

            .hero h1 {
                font-size: clamp(29px, 8vw, 36px);
            }

            .hero p {
                font-size: 15px;
            }

            .label {
                font-size: 10px;
                padding: 8px 12px;
            }

            .form-card {
                padding: 23px 18px;
                border-radius: 20px;
            }

            .form-header {
                align-items: flex-start;
                gap: 12px;
            }

            .form-header h2 {
                font-size: clamp(19px, 5.5vw, 22px);
                overflow-wrap: anywhere;
            }

            .icon {
                width: 48px;
                height: 48px;
                flex: 0 0 48px;
                font-size: 23px;
            }

            input {
                font-size: 16px;
            }

            .status-card {
                padding: 16px;
                overflow-wrap: anywhere;
            }

            .info-section {
                grid-template-columns: 1fr;
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


    <!-- ================= NAVBAR ================= -->

    <nav>

        <a href="{{ url('/') }}" class="brand">

            <img
                src="{{ asset('images/logo.jpg') }}"
                alt="Logo Universitas Sriwijaya"
                class="brand-logo"
            >

            <div class="brand-text">

                <div class="brand-title">
                    Sistem Pengaduan & Aspirasi Mahasiswa
                </div>

                <div class="brand-subtitle">
                    UNIVERSITAS SRIWIJAYA
                </div>

            </div>

        </a>


        <div class="menu">

            <a href="{{ url('/') }}">
                Beranda
            </a>

            <a href="{{ url('/pengaduan') }}">
                Pengaduan
            </a>

            <a href="{{ url('/aspirasi') }}">
                Aspirasi
            </a>

            <a href="{{ url('/cek-status') }}" class="active">
                Cek Status
            </a>

            <a href="{{ route('transparansi') }}">
                Transparansi
            </a>

            <a href="{{ url('/admin/login') }}" class="admin-btn">
                Admin
            </a>

        </div>

    </nav>


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-content">

            <div class="label">
                ✦ LAYANAN PENGADUAN MAHASISWA UNSRI
            </div>

            <h1>
                Pantau Pengaduan,
                <br>
                <span>Ketahui Perkembangannya.</span>
            </h1>

            <p>
                Masukkan NIM yang digunakan saat mengirim pengaduan
                untuk melihat perkembangan dan status laporan kamu
                di Universitas Sriwijaya.
            </p>

        </div>

    </section>


    <!-- ================= CONTENT ================= -->

    <main class="container">

        <div class="form-card">

            <div class="form-header">

                <div class="icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 5 5"/></svg>
                </div>

                <div>

                    <h2>
                        Cek Status Pengaduan
                    </h2>

                    <p>
                        Masukkan NIM yang digunakan saat mengirim pengaduan.
                    </p>

                </div>

            </div>


            @if($errors->any())

                <div class="error">

                    <strong>Data belum lengkap.</strong>

                    <ul style="margin-top:8px; margin-left:20px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ url('/cek-status') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="nim">
                        NIM
                    </label>

                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        value="{{ old('nim') }}"
                        placeholder="Masukkan NIM kamu"
                        required
                    >

                    <div class="hint">
                        🔐 Gunakan NIM yang sama ketika membuat pengaduan.
                    </div>

                </div>


                <button type="submit" class="submit-btn">
                    🔎 Cek Status Pengaduan
                </button>

            </form>


            <!-- ================= HASIL STATUS ================= -->

            @if(isset($pengaduans))

                <div class="status-list">

                    @if($pengaduans->count() > 0)

                        <div class="result-summary" role="status" aria-live="polite">
                            <span class="result-summary-icon" aria-hidden="true">✓</span>
                            <div>
                                <strong>Data pengaduan ditemukan</strong>
                                <p>
                                    {{ $pengaduans->count() }}
                                    laporan tersimpan ditemukan untuk NIM yang kamu masukkan.
                                    Berikut status dan detail laporannya.
                                </p>
                            </div>
                        </div>

                        @foreach($pengaduans as $pengaduan)

                            <div class="status-card">

                                <h3>
                                    {{ $pengaduan->judul }}
                                </h3>

                                <p>
                                    <strong>Nama:</strong>
                                    {{ $pengaduan->nama }}
                                </p>

                                <p>
                                    <strong>Kategori:</strong>
                                    {{ $pengaduan->kategori }}
                                </p>

                                <p>
                                    <strong>Isi Pengaduan:</strong>
                                    {{ $pengaduan->isi }}
                                </p>

                                @if($pengaduan->evidence_path)
                                    <p>
                                        <strong>Bukti:</strong>
                                        <a href="{{ URL::temporarySignedRoute('pengaduan.evidence', now()->addMinutes(30), ['pengaduan' => $pengaduan->id]) }}">
                                            Unduh lampiran
                                        </a>
                                    </p>
                                @endif

                                <span class="status-badge">
                                    Status: {{ $pengaduan->status === 'Menunggu' ? 'Dikirim' : $pengaduan->status }}
                                </span>

                                <div class="timeline">
                                    <h4>Perjalanan Laporan</h4>
                                    <ol class="timeline-list">
                                        @foreach($pengaduan->timeline as $stage)
                                            <li class="timeline-item {{ $stage['reached'] ? 'is-reached' : 'is-pending' }}">
                                                <strong>{{ $stage['status'] }}</strong>

                                                @if($stage['event'])
                                                    <time datetime="{{ $stage['event']->created_at->toIso8601String() }}">
                                                        {{ $stage['event']->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB
                                                    </time>
                                                @elseif($stage['reached'])
                                                    <span>Waktu belum tercatat pada riwayat lama.</span>
                                                @else
                                                    <span>Menunggu tahap sebelumnya.</span>
                                                @endif

                                                @if($stage['event'] && $stage['event']->note)
                                                    <p class="timeline-note">
                                                        <span>Catatan tindak lanjut admin</span>
                                                        {{ $stage['event']->note }}
                                                    </p>
                                                @elseif($stage['status'] === 'Dikirim' && $stage['reached'])
                                                    <p class="timeline-note">Laporan berhasil dikirim.</p>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="empty">

                            <h3>
                                Pengaduan Tidak Ditemukan
                            </h3>

                            <p style="margin-top:8px;">
                                Belum ditemukan pengaduan dengan NIM tersebut.
                                Silakan periksa kembali NIM yang dimasukkan.
                            </p>

                        </div>

                    @endif

                </div>

            @endif

        </div>


        <!-- ================= INFO ================= -->

        <div class="info-section">

            <a href="{{ url('/pengaduan') }}" class="info-card">

                <div class="small-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M8 13h8M8 17h6"/></svg>
                </div>

                <h3>
                    Kirim Pengaduan
                </h3>

                <p>
                    Sampaikan permasalahan yang kamu alami
                    melalui halaman Pengaduan Mahasiswa.
                </p>

            </a>


            <a href="#nim" class="info-card">

                <div class="small-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 5 5"/></svg>
                </div>

                <h3>
                    Pantau Laporan
                </h3>

                <p>
                    Gunakan NIM untuk melihat perkembangan
                    pengaduan yang telah kamu kirim.
                </p>

            </a>


            <a href="{{ url('/') }}" class="info-card">

                <div class="small-icon">
                    🏛️
                </div>

                <h3>
                    Layanan UNSRI
                </h3>

                <p>
                    Sistem ini membantu mahasiswa menyampaikan
                    pengaduan dan aspirasi kepada Universitas Sriwijaya.
                </p>

            </a>

        </div>

    </main>


    <!-- ================= FOOTER ================= -->

    <footer>

        <p>
            © {{ date('Y') }}
            <strong>Sistem Pengaduan & Aspirasi Mahasiswa</strong>
        </p>

        <p style="margin-top:7px;">
            Universitas Sriwijaya
        </p>

    </footer>


</body>

</html>