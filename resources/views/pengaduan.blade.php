<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaduan Mahasiswa | SIPAM UNSRI</title>

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
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 10% 35%, rgba(27, 104, 184, .06), transparent 27%),
                #f3f7fc;
            color: #142b55;
        }

        /* ================= NAVBAR ================= */

        nav {
            min-height: 78px;
            background: linear-gradient(110deg, #08265f, #0c3475);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            color: white;
            box-shadow: 0 8px 24px rgba(5, 31, 78, .18);
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 4px;
            box-shadow: 0 5px 14px rgba(0,0,0,.14);
        }

        .brand-text {
            line-height: 1.15;
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
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            transition: .3s;
            position: relative;
        }

        .nav-menu a:hover {
            color: #ffc928;
        }

        .nav-menu .active {
            color: #ffc928;
        }

        .admin-btn {
            background: linear-gradient(135deg, #ffda61, #ffc21b);
            color: #08265f !important;
            padding: 11px 19px;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(255, 201, 40, .2);
        }

        .nav-menu .admin-btn:hover {
            color: #08265f !important;
            transform: translateY(-2px);
            box-shadow: 0 11px 22px rgba(255, 201, 40, .3);
        }

        /* ================= HERO ================= */

        .hero {
            position: relative;
            min-height: 340px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(
                    105deg,
                    rgba(5, 31, 78, .94),
                    rgba(11, 55, 125, .84)
                ),
                url("{{ asset('images/unsri-campus.jpg') }}")
                center/cover;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 201, 40, .12);
            right: -80px;
            top: -100px;
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(5,31,78,.12), transparent 72%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 84%;
            max-width: 1120px;
            margin: auto;
        }

        .badge {
            display: inline-block;
            padding: 10px 17px;
            border: 1px solid rgba(255,201,40,.5);
            border-radius: 30px;
            color: #ffc928;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.2px;
            margin-bottom: 20px;
            background: rgba(255,255,255,.08);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.1);
        }

        .hero h1 {
            color: white;
            font-size: clamp(38px, 4vw, 54px);
            line-height: 1.1;
            margin-bottom: 17px;
            letter-spacing: -1.2px;
        }

        .hero h1 span {
            color: #ffc928;
        }

        .hero p {
            color: #e5edff;
            max-width: 700px;
            line-height: 1.7;
            font-size: 17px;
        }

        /* ================= CONTENT ================= */

        .content {
            width: 84%;
            max-width: 1000px;
            margin: -50px auto 76px;
            position: relative;
            z-index: 5;
        }

        .form-card {
            background: white;
            border: 1px solid rgba(21, 72, 130, .07);
            border-radius: 26px;
            padding: 34px;
            box-shadow: 0 22px 55px rgba(17, 43, 85, .15);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            flex: 0 0 60px;
            border-radius: 17px;
            background: linear-gradient(135deg, #eaf1ff, #dce9ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: inset 0 1px 0 white;
        }

        .form-header h2 {
            font-size: 27px;
            color: #08265f;
            letter-spacing: -.4px;
        }

        .form-header p {
            color: #7184a2;
            margin-top: 5px;
            font-size: 14px;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #18345f;
            font-size: 14px;
        }

        label span {
            color: #e53935;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d7dfec;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 14px;
            outline: none;
            background: #f9fbff;
            color: #243b63;
            transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #1769d1;
            background: white;
            box-shadow: 0 0 0 4px rgba(23,105,209,.09);
        }

        textarea {
            resize: vertical;
            min-height: 160px;
            line-height: 1.6;
        }

        .file-picker {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 12px;
            border: 1px solid #d7dfec;
            border-radius: 12px;
            background: #f9fbff;
        }

        .file-picker:focus-within {
            border-color: #1769d1;
            box-shadow: 0 0 0 4px rgba(23,105,209,.09);
        }

        .file-picker input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            clip-path: inset(50%);
            border: 0;
        }

        .file-picker-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            margin: 0;
            padding: 0 16px;
            border-radius: 9px;
            background: #e8f1ff;
            color: #084f9f;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s ease;
        }

        .file-picker-button:hover {
            background: #dceaff;
        }

        .file-picker input[type="file"]:focus-visible + .file-picker-button {
            outline: 3px solid rgba(11, 99, 194, .3);
            outline-offset: 3px;
        }

        .file-name {
            min-width: 0;
            color: #7184a2;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .field-hint {
            margin-top: 7px;
            color: #7184a2;
            font-size: 12px;
            line-height: 1.5;
        }

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .info-box {
            background: #fff8e3;
            border: 1px solid rgba(255, 201, 40, .28);
            border-left: 4px solid #ffc928;
            padding: 15px 17px;
            border-radius: 12px;
            margin-bottom: 25px;
            color: #655522;
            font-size: 13px;
            line-height: 1.6;
            box-shadow: 0 6px 16px rgba(151, 114, 10, .05);
        }

        .submit-area {
            margin-top: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .submit-note {
            font-size: 12px;
            color: #7b879c;
        }

        .submit-btn {
            border: none;
            background: linear-gradient(135deg, #0b63c2, #08458f);
            color: white;
            padding: 15px 28px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
            box-shadow: 0 9px 18px rgba(11, 88, 176, .2);
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #084f9f, #073874);
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(11,88,176,.28);
        }

        .submit-btn:focus-visible {
            outline: 3px solid rgba(11, 99, 194, .3);
            outline-offset: 3px;
        }

        /* ================= SUCCESS ================= */

        .success {
            background: #e8f8ee;
            border: 1px solid #b8e7c8;
            color: #18733b;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.6;
        }

        /* ================= FOOTER ================= */

        footer {
            background: linear-gradient(110deg, #061d49, #092f6b);
            color: #cbd6eb;
            padding: 28px 7%;
            text-align: center;
            font-size: 13px;
        }

        footer strong {
            color: #ffc928;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 850px) {

            nav {
                padding: 0 4%;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .brand-title {
                font-size: 13px;
            }

            .hero h1 {
                font-size: 35px;
            }

            .two-column {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        @media (max-width: 600px) {

            body {
                width: 100%;
                overflow-x: hidden;
            }

            nav {
                height: auto;
                padding: 15px 5%;
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .brand {
                max-width: 100%;
                min-width: 0;
            }

            .brand-logo {
                width: 46px;
                height: 46px;
            }

            .brand-title {
                font-size: 13px;
                overflow-wrap: anywhere;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .nav-menu {
                flex-wrap: wrap;
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
                padding: 42px 0 70px;
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
                font-size: 10px;
                padding: 8px 12px;
            }

            .content {
                width: 92%;
                margin-top: -42px;
                margin-bottom: 48px;
            }

            .form-card {
                padding: 24px 18px;
                border-radius: 20px;
            }

            .file-picker {
                align-items: flex-start;
            }

            .file-name {
                flex: 1 1 100%;
            }

            .form-header {
                align-items: flex-start;
                gap: 12px;
            }

            .form-header h2 {
                font-size: 22px;
            }

            .icon-box {
                width: 48px;
                height: 48px;
                flex: 0 0 48px;
                font-size: 23px;
            }

            input,
            select,
            textarea {
                font-size: 16px;
            }

            .info-box {
                padding: 13px 14px;
            }

            .submit-area {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .submit-btn {
                width: 100%;
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

    <div class="nav-menu">

        <a href="{{ url('/') }}">
            Beranda
        </a>

        <a href="{{ url('/pengaduan') }}" class="active">
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

        <div class="badge">
            PORTAL PENGADUAN MAHASISWA UNSRI
        </div>

        <h1>
            Sampaikan Masalah,<br>
            <span>Dapatkan Solusi.</span>
        </h1>

        <p>
            Sampaikan permasalahan yang kamu alami di lingkungan
            Universitas Sriwijaya secara aman, terarah, dan mudah.
            Setiap laporan akan diproses sesuai dengan ketentuan yang berlaku.
        </p>

    </div>

</section>


<!-- ================= FORM ================= -->

<main class="content">

    <div class="form-card">

        <div class="form-header">

            <div class="icon-box">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M8 13h8M8 17h6"/></svg>
            </div>

            <div>
                <h2>
                    Form Pengaduan
                </h2>

                <p>
                    Lengkapi data berikut agar pengaduan dapat diproses.
                </p>
            </div>

        </div>


        @if(session('success'))

            <div class="success">
                ✓ {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="success" style="background:#fff0f0; color:#b42318; border-color:#f3c2c2;">

                <strong>Periksa kembali data kamu:</strong>

                <ul style="margin:8px 0 0 20px;">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="info-box">

            💡 <strong>Informasi:</strong>
            Gunakan bahasa yang sopan dan jelaskan permasalahan
            secara jelas agar pihak terkait dapat memahami laporan kamu.

        </div>


        <form action="{{ url('/pengaduan') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="two-column">

                <div class="form-group">

                    <label for="nama">
                        Nama Lengkap <span>*</span>
                    </label>

                    <input
                        id="nama"
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="nim">
                        NIM <span>*</span>
                    </label>

                    <input
                        id="nim"
                        type="text"
                        name="nim"
                        value="{{ old('nim') }}"
                        placeholder="Masukkan NIM"
                        required
                    >

                </div>

            </div>


            <div class="form-group">

                <label for="kategori">
                    Kategori Pengaduan <span>*</span>
                </label>

                <select id="kategori" name="kategori" required>

                    <option value="">
                        -- Pilih kategori pengaduan --
                    </option>

                    <option value="Fasilitas Kampus" {{ old('kategori') === 'Fasilitas Kampus' ? 'selected' : '' }}>
                        Fasilitas Kampus
                    </option>

                    <option value="Akademik" {{ old('kategori') === 'Akademik' ? 'selected' : '' }}>
                        Akademik
                    </option>

                    <option value="Pelayanan" {{ old('kategori') === 'Pelayanan' ? 'selected' : '' }}>
                        Pelayanan
                    </option>

                    <option value="Kebersihan" {{ old('kategori') === 'Kebersihan' ? 'selected' : '' }}>
                        Kebersihan
                    </option>

                    <option value="Teknologi Informasi" {{ old('kategori') === 'Teknologi Informasi' ? 'selected' : '' }}>
                        Teknologi Informasi
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="judul">
                    Judul Pengaduan <span>*</span>
                </label>

                <input
                    id="judul"
                    type="text"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Kerusakan fasilitas ruang kelas"
                    required
                >

            </div>


            <div class="form-group">

                <label for="isi">
                    Isi Pengaduan <span>*</span>
                </label>

                <textarea
                    id="isi"
                    name="isi"
                    placeholder="Jelaskan permasalahan secara lengkap..."
                    required
                >{{ old('isi') }}</textarea>

            </div>

            <div class="form-group">
                <label for="bukti">Bukti Pengaduan (opsional)</label>
                <div class="file-picker">
                    <input
                        id="bukti"
                        type="file"
                        name="bukti"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                        aria-describedby="bukti-hint"
                    >
                    <label for="bukti" class="file-picker-button">Pilih bukti</label>
                    <span id="bukti-nama-file" class="file-name" aria-live="polite">
                        Belum ada file dipilih
                    </span>
                </div>
                <p class="field-hint">
                    <span id="bukti-hint">
                    Lampirkan foto atau dokumen pendukung (JPG, PNG, PDF, DOC, DOCX), maksimal 5 MB.
                    </span>
                </p>
            </div>


            <div class="submit-area">

                <div class="submit-note">
                    🔒 Data pengaduan digunakan untuk keperluan
                    penanganan laporan mahasiswa.
                </div>

                <button type="submit" class="submit-btn">
                    Kirim Pengaduan →
                </button>

            </div>

        </form>

    </div>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <p>
        © {{ date('Y') }}
        <strong>Sistem Pengaduan & Aspirasi Mahasiswa</strong>
        — Universitas Sriwijaya
    </p>

</footer>

<script>
    const inputBukti = document.getElementById('bukti');
    const namaFileBukti = document.getElementById('bukti-nama-file');

    inputBukti.addEventListener('change', () => {
        namaFileBukti.textContent = inputBukti.files.length
            ? inputBukti.files[0].name
            : 'Belum ada file dipilih';
    });
</script>

</body>
</html>