<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aspirasi Mahasiswa | Sistem Pengaduan & Aspirasi UNSRI</title>

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

        /* LOGO UNSRI */

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

        /* MENU */

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

        .admin-btn {
            background: #ffc629;
            color: #06245f !important;
            padding: 12px 20px;
            border-radius: 10px;
        }

        .admin-btn:hover {
            background: #ffd84d;
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
            background: #fff4cc;
            color: #e2a900;
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

        input,
        textarea {
            width: 100%;
            border: 1px solid #d8dfeb;
            border-radius: 12px;
            padding: 15px 17px;
            font-size: 15px;
            outline: none;
            background: #fbfcff;
            transition: 0.25s;
        }

        input:focus,
        textarea:focus {
            border-color: #1769c2;
            box-shadow: 0 0 0 4px rgba(23,105,194,0.10);
            background: white;
        }

        textarea {
            min-height: 160px;
            resize: vertical;
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

        /* ================= INFO ================= */

        .info-section {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-card {
            background: white;
            border-radius: 17px;
            padding: 22px;
            border: 1px solid #e4e9f2;
            transition: 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(10,40,90,0.10);
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

            nav {
                padding: 12px 5%;
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .brand {
                max-width: 100%;
            }

            .brand-logo {
                width: 46px;
                height: 46px;
            }

            .brand-title {
                font-size: 14px;
            }

            .menu {
                gap: 12px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .menu a {
                font-size: 12px;
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

            .container {
                width: 92%;
                margin-top: -42px;
            }

            .form-card {
                padding: 25px;
            }

            .info-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            body {
                width: 100%;
                overflow-x: hidden;
            }

            nav {
                padding: 14px 4%;
                gap: 12px;
            }

            .brand,
            .brand-text {
                min-width: 0;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-title {
                font-size: 12px;
            }

            .brand-subtitle {
                font-size: 9px;
            }

            .menu {
                gap: 10px 14px;
                justify-content: center;
            }

            .menu a {
                font-size: 12px;
                min-height: 40px;
                padding: 8px 5px;
                display: inline-flex;
                align-items: center;
            }

            .hero {
                min-height: 320px;
                padding: 42px 6%;
            }

            .hero h1 {
                font-size: clamp(28px, 8vw, 34px);
            }

            .hero p {
                font-size: 15px;
            }

            .label {
                font-size: 10px;
                padding: 8px 12px;
            }

            .container {
                margin-bottom: 48px;
            }

            .form-card {
                padding: 23px 18px;
                border-radius: 20px;
            }

            .form-header > div:last-child {
                min-width: 0;
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

            input,
            textarea {
                font-size: 16px;
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

            <a href="{{ url('/cek-status') }}">
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
                ✦ RUANG SUARA MAHASISWA UNSRI
            </div>

            <h1>
                Sampaikan Ide,
                <br>
                <span>Bangun UNSRI Bersama.</span>
            </h1>

            <p>
                Gunakan layanan aspirasi mahasiswa untuk menyampaikan
                ide, kritik, saran, dan masukan yang konstruktif demi
                menciptakan lingkungan Universitas Sriwijaya yang lebih
                baik.
            </p>

        </div>

    </section>


    <!-- ================= FORM ================= -->

    <main class="container">

        <div class="form-card">

            <div class="form-header">

                <div class="icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18h6M10 22h4M8.5 14.5A7 7 0 1 1 15.5 14.5c-.9.8-1.5 1.7-1.5 2.5h-4c0-.8-.6-1.7-1.5-2.5z"/></svg>
                </div>

                <div>

                    <h2>
                        Form Aspirasi Mahasiswa
                    </h2>

                    <p>
                        Sampaikan ide dan masukan kamu untuk Universitas Sriwijaya.
                    </p>

                </div>

            </div>


            @if(session('success'))

                <div class="success">
                    ✓ {{ session('success') }}
                </div>

            @endif


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


            <form action="{{ url('/aspirasi') }}" method="POST">

                @csrf


                <div class="form-group">

                    <label for="nama">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="nim">
                        NIM (Opsional)
                    </label>

                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        value="{{ old('nim') }}"
                        placeholder="Masukkan NIM"
                    >

                </div>


                <div class="form-group">

                    <label for="judul">
                        Judul Aspirasi
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Peningkatan fasilitas ruang belajar"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="isi">
                        Isi Aspirasi
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        placeholder="Tuliskan ide, kritik, saran, atau masukan kamu..."
                        required
                    >{{ old('isi') }}</textarea>

                    <div class="hint">
                        💡 Sampaikan aspirasi dengan jelas, sopan, dan konstruktif.
                    </div>

                </div>


                <button type="submit" class="submit-btn">
                    Kirim Aspirasi →
                </button>

            </form>

        </div>


        <!-- ================= INFO ================= -->

        <div class="info-section">

            <div class="info-card">

                <div class="small-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18h6M10 22h4M8.5 14.5A7 7 0 1 1 15.5 14.5c-.9.8-1.5 1.7-1.5 2.5h-4c0-.8-.6-1.7-1.5-2.5z"/></svg>
                </div>

                <h3>
                    Berikan Ide
                </h3>

                <p>
                    Sampaikan ide dan inovasi yang dapat membantu
                    meningkatkan kualitas pelayanan kampus.
                </p>

            </div>


            <div class="info-card">

                <div class="small-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8 8 0 0 1-3-.6L4 20l1.5-4A7.2 7.2 0 0 1 4 11.5 7.5 7.5 0 0 1 12 4a7.5 7.5 0 0 1 8 7.5z"/><path d="M8 12h.01M12 12h.01M16 12h.01"/></svg>
                </div>

                <h3>
                    Suara Mahasiswa
                </h3>

                <p>
                    Aspirasi mahasiswa menjadi salah satu masukan
                    dalam pengembangan lingkungan Universitas Sriwijaya.
                </p>

            </div>


            <div class="info-card">

                <div class="small-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 9 9-6 9 6M5 10v9M9 10v9M15 10v9M19 10v9M3 21h18M3 10h18"/></svg>
                </div>

                <h3>
                    Untuk UNSRI
                </h3>

                <p>
                    Mari bersama-sama membangun Universitas Sriwijaya
                    menjadi lingkungan akademik yang lebih baik.
                </p>

            </div>

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