<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Pengaduan & Aspirasi Mahasiswa</title>

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
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fc;
            color: #0b3570;
        }

        .navbar {
            height: 112px;
            background: #092f6b;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .brand img {
            width: 74px;
            height: 74px;
            object-fit: contain;
            background: white;
            border-radius: 10px;
            padding: 5px;
        }

        .brand-text h1 {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .brand-text p {
            color: #ffc328;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            text-decoration: none;
            color: white;
            font-size: 20px;
            font-weight: bold;
            transition: .3s;
        }

        .nav-menu a:hover {
            color: #ffc328;
        }

        .nav-menu .admin-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 6px 13px 6px 7px;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 999px;
            color: white;
            font-size: 15px;
            transition: .3s;
        }

        .admin-avatar {
            display: inline-flex;
            width: 32px;
            height: 32px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ffc328;
            color: #092f6b;
        }

        .admin-avatar svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .nav-menu .admin-btn:hover {
            border-color: #ffc328;
            background: rgba(255, 195, 40, .12);
            color: #ffc328;
            transform: translateY(-1px);
        }

        .hero {
            min-height: 670px;
            position: relative;
            display: flex;
            align-items: center;
            background-image:
                linear-gradient(
                    rgba(7, 65, 125, .86),
                    rgba(0, 107, 184, .82)
                ),
                url('{{ asset("images/unsri-campus.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(
                    circle at 80% 30%,
                    rgba(255,255,255,.12),
                    transparent 25%
                );
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 90%;
            max-width: 1450px;
            margin: auto;
            padding: 60px 0;
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(300px, .8fr);
            align-items: center;
            gap: 48px;
        }

        .hero-copy {
            min-width: 0;
        }

        .hero-label {
            display: inline-block;
            border: 1px solid #ffc328;
            color: #ffc328;
            padding: 11px 25px;
            border-radius: 30px;
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .hero h2 {
            color: white;
            font-size: 66px;
            line-height: 1.08;
            max-width: 900px;
            font-weight: 800;
            margin-bottom: 30px;
        }

        .hero h2 span {
            color: #ffc328;
        }

        .hero-description {
            color: white;
            font-size: 22px;
            line-height: 1.8;
            max-width: 950px;
            margin-bottom: 38px;
        }

        .hero-highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 24px;
        }

        .hero-highlight {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: rgba(255, 255, 255, .92);
            font-size: 14px;
            font-weight: 600;
        }

        .hero-highlight span {
            display: inline-flex;
            width: 22px;
            height: 22px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 195, 40, .18);
            color: #ffc328;
            font-size: 12px;
        }

        .hero-quicklinks {
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, .26);
            border-radius: 26px;
            background: rgba(7, 39, 83, .48);
            box-shadow: 0 24px 60px rgba(3, 25, 57, .22);
            backdrop-filter: blur(12px);
        }

        .hero-quicklinks-label {
            display: inline-block;
            margin-bottom: 16px;
            color: #ffc328;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .13em;
        }

        .hero-quicklinks h3 {
            margin-bottom: 10px;
            color: white;
            font-size: 26px;
            line-height: 1.25;
        }

        .hero-quicklinks > p {
            margin-bottom: 22px;
            color: rgba(255, 255, 255, .82);
            font-size: 15px;
            line-height: 1.65;
        }

        .hero-quicklinks-list {
            display: grid;
            gap: 10px;
        }

        .hero-quicklink {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, .14);
            border-radius: 14px;
            color: white;
            text-decoration: none;
            transition: .25s;
        }

        .hero-quicklink:hover {
            border-color: rgba(255, 195, 40, .75);
            background: rgba(255, 255, 255, .09);
            transform: translateX(4px);
        }

        .hero-quicklink-icon {
            display: inline-flex;
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(255, 195, 40, .16);
            color: #ffc328;
            font-size: 18px;
        }

        .hero-quicklink-text {
            flex: 1;
            font-size: 14px;
            font-weight: 700;
        }

        .hero-quicklink-arrow {
            color: #ffc328;
            font-size: 18px;
        }

        .voice-intro {
            padding: 48px 5%;
            background: #fff;
        }

        .voice-intro-inner {
            max-width: 1450px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(220px, 0.9fr) 2fr;
            gap: 36px;
            align-items: center;
        }

        .voice-intro-heading span {
            display: inline-block;
            margin-bottom: 12px;
            color: #0879cc;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .voice-intro-heading h2 {
            color: #0b3570;
            font-size: clamp(25px, 3vw, 36px);
            line-height: 1.2;
        }

        .voice-steps {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .voice-step {
            padding: 22px;
            border: 1px solid #e3ebf5;
            border-radius: 18px;
            background: #f8faff;
        }

        .voice-step-number {
            display: inline-flex;
            width: 36px;
            height: 36px;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            border-radius: 12px;
            background: #e5f1ff;
            color: #0879cc;
            font-weight: 700;
        }

        .voice-step h3 {
            margin-bottom: 8px;
            color: #0b3570;
            font-size: 17px;
        }

        .voice-step p {
            color: #6480a5;
            font-size: 14px;
            line-height: 1.6;
        }

        .services {
            padding: 75px 5% 90px;
            background: #f4f7fc;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            color: #0b3b78;
            font-size: 38px;
            margin-bottom: 8px;
        }

        .section-title p {
            color: #6480a5;
            font-size: 19px;
        }

        .cards {
            max-width: 1450px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .card {
            position: relative;
            display: block;
            background: white;
            min-height: 330px;
            padding: 35px;
            border-radius: 24px;
            color: inherit;
            text-decoration: none;
            box-shadow: 0 12px 35px rgba(16, 54, 95, .10);
            overflow: hidden;
            transition: .35s;
        }

        .card:hover {
            transform: translateY(-9px);
            box-shadow: 0 20px 45px rgba(16, 54, 95, .16);
        }

        .card:focus-visible {
            outline: 3px solid #0879cc;
            outline-offset: 4px;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }

        .card-pengumuman::before {
            background: #ef2565;
        }

        .card-bantuan::before {
            background: #ff9d00;
        }

        .card-tentang::before {
            background: #08a984;
        }

        .card-icon {
            width: 74px;
            height: 74px;
            background: #092f6b;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            margin-bottom: 27px;
            box-shadow: 0 10px 20px rgba(9,47,107,.20);
        }

        .card h3 {
            color: #0b3570;
            font-size: 27px;
            margin-bottom: 16px;
        }

        .card p {
            color: #617c9f;
            font-size: 18px;
            line-height: 1.7;
            min-height: 90px;
        }

        .card-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #0879cc;
            font-size: 18px;
            font-weight: bold;
            transition: .3s;
        }

        .card-link:hover {
            color: #092f6b;
            transform: translateX(5px);
        }

        .info-dialog {
            width: min(560px, calc(100% - 32px));
            max-width: none;
            max-height: calc(100% - 32px);
            margin: auto;
            padding: 32px;
            border: 0;
            border-radius: 22px;
            color: #0b3570;
            box-shadow: 0 24px 70px rgba(9, 47, 107, .28);
        }

        .info-dialog::backdrop {
            background: rgba(5, 24, 53, .62);
            backdrop-filter: blur(3px);
        }

        .info-dialog h2 {
            margin: 0 40px 14px 0;
            font-size: 26px;
        }

        .info-dialog p,
        .info-dialog li {
            color: #617c9f;
            font-size: 16px;
            line-height: 1.7;
        }

        .info-dialog ul {
            margin: 12px 0 0;
            padding-left: 22px;
        }

        .info-dialog-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 36px;
            height: 36px;
            border: 0;
            border-radius: 50%;
            background: #edf3fa;
            color: #0b3570;
            font-size: 22px;
            cursor: pointer;
        }

        .info-dialog-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 22px;
        }

        .info-dialog-actions a {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 10px;
            background: #092f6b;
            color: white;
            font-weight: 700;
            text-decoration: none;
        }

        .info-dialog-actions a:hover {
            background: #0879cc;
        }

        .faq-section {
            padding: 76px 5% 84px;
            background: #fff;
        }

        .faq-inner {
            max-width: 980px;
            margin: 0 auto;
        }

        .faq-list {
            display: grid;
            gap: 14px;
        }

        .faq-item {
            border: 1px solid #e0e9f4;
            border-radius: 16px;
            background: #f9fbff;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .faq-item[open] {
            border-color: #b8d8f5;
            box-shadow: 0 12px 26px rgba(16, 54, 95, .07);
        }

        .faq-item summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 22px;
            color: #0b3570;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            list-style: none;
        }

        .faq-item summary::-webkit-details-marker {
            display: none;
        }

        .faq-item summary::after {
            content: "+";
            display: inline-flex;
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e6f2ff;
            color: #0879cc;
            font-size: 21px;
            transition: transform .2s ease;
        }

        .faq-item[open] summary::after {
            content: "−";
        }

        .faq-item summary:focus-visible {
            outline: 3px solid #0879cc;
            outline-offset: 3px;
            border-radius: 16px;
        }

        .faq-answer {
            padding: 0 22px 20px;
            color: #617c9f;
            font-size: 15px;
            line-height: 1.75;
        }

        .faq-answer a {
            color: #0879cc;
            font-weight: 700;
            text-decoration: none;
        }

        .faq-answer a:hover {
            text-decoration: underline;
        }

        .campus-footer {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(rgba(5, 19, 39, .72), rgba(2, 14, 29, .82)),
                url('{{ asset("images/unsri-campus.jpg") }}') center 48% / cover;
            color: #fff;
        }

        .campus-footer-inner {
            width: min(1200px, 86%);
            margin: 0 auto;
            padding: 54px 0 28px;
        }

        .campus-footer-content {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: clamp(48px, 10vw, 150px);
        }

        .campus-footer h2 {
            margin: 0 0 12px;
            color: #fff;
            font-size: 25px;
            font-weight: 800;
        }

        .campus-footer-rule {
            width: 56px;
            height: 3px;
            margin-bottom: 28px;
            background: #ffc328;
        }

        .campus-footer-brand {
            display: flex;
            align-items: center;
            gap: 22px;
            margin-bottom: 24px;
        }

        .campus-footer-brand img {
            width: 96px;
            height: 96px;
            object-fit: contain;
            padding: 4px;
            border-radius: 50%;
            background: #fff;
        }

        .campus-footer-brand h3 {
            color: #fff;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(25px, 3vw, 43px);
            font-weight: 500;
            letter-spacing: .07em;
            line-height: 1.12;
        }

        .campus-footer-contact p {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 12px 0;
            color: rgba(255,255,255,.94);
            font-size: 15px;
            line-height: 1.55;
        }

        .campus-footer-contact a {
            color: inherit;
            text-decoration: none;
            transition: color .2s ease;
        }

        .campus-footer-contact a:hover,
        .campus-footer-contact a:focus-visible {
            color: #ffc328;
            text-decoration: underline;
        }

        .campus-footer-icon {
            width: 20px;
            flex: 0 0 20px;
            color: #ffc328;
            font-size: 17px;
            text-align: center;
        }

        .campus-footer-location a {
            display: block;
            margin: 0 0 20px;
            color: rgba(255,255,255,.94);
            font-size: 16px;
            line-height: 1.5;
            text-decoration: none;
            transition: color .2s ease, transform .2s ease;
        }

        .campus-footer-location a:hover,
        .campus-footer-location a:focus-visible {
            color: #ffc328;
            transform: translateX(4px);
        }

        .campus-footer-location a span {
            margin-right: 8px;
            color: #ffc328;
        }

        .campus-footer-social {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 40px;
        }

        .campus-footer-social span {
            display: inline-flex;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.26);
            border-radius: 50%;
            background: rgba(255,255,255,.13);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
        }

        .footer {
            background: #092f6b;
            color: white;
            text-align: center;
            padding: 28px 20px;
            font-size: 15px;
        }

        @media (max-width: 1000px) {
            .navbar {
                height: auto;
                padding: 20px 5%;
                flex-direction: column;
                gap: 20px;
            }

            .nav-menu {
                gap: 18px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-menu a {
                font-size: 16px;
            }

            .hero {
                min-height: 600px;
            }

            .hero h2 {
                font-size: 48px;
            }

            .hero-description {
                font-size: 18px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .hero-quicklinks {
                max-width: 600px;
            }

            .voice-intro-inner {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .cards {
                grid-template-columns: 1fr;
                max-width: 600px;
            }

            .campus-footer-content {
                grid-template-columns: 1fr;
                gap: 36px;
            }
        }

        @media (max-width: 600px) {
            body {
                width: 100%;
                overflow-x: hidden;
            }

            .navbar {
                align-items: stretch;
                padding: 16px 6%;
            }

            .brand {
                width: 100%;
                min-width: 0;
            }

            .brand img {
                width: 60px;
                height: 60px;
                flex: 0 0 60px;
            }

            .brand-text {
                min-width: 0;
            }

            .brand-text h1 {
                font-size: 19px;
                line-height: 1.25;
                overflow-wrap: anywhere;
            }

            .brand-text p {
                font-size: 12px;
            }

            .hero-content {
                width: 88%;
                padding: 42px 0;
                gap: 24px;
            }

            .hero h2 {
                font-size: clamp(30px, 9vw, 38px);
            }

            .hero-label {
                font-size: 15px;
            }

            .hero-description {
                font-size: 16px;
                line-height: 1.65;
            }

            .hero-quicklinks {
                width: 100%;
                padding: 22px 18px;
                border-radius: 20px;
            }

            .voice-intro {
                padding: 36px 6%;
            }

            .voice-steps {
                grid-template-columns: 1fr;
            }

            .section-title h2 {
                font-size: 30px;
            }

            .card {
                padding: 22px;
            }

            .campus-footer-inner {
                width: 88%;
                padding-top: 42px;
            }

            .campus-footer-brand {
                gap: 15px;
            }

            .campus-footer-brand img {
                width: 72px;
                height: 72px;
            }

            .campus-footer h2 {
                font-size: 21px;
            }

            .campus-footer-social {
                margin-top: 24px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/sipam-theme.css') }}">
</head>

<body>

    <header class="navbar">
        <div class="brand">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Universitas Sriwijaya">
            <div class="brand-text">
                <h1>Sistem Pengaduan & Aspirasi Mahasiswa</h1>
                <p>UNIVERSITAS SRIWIJAYA</p>
            </div>
        </div>

        <nav class="nav-menu">
            <a href="{{ session('admin_login') ? route('admin.dashboard') : route('admin.login') }}" class="admin-btn">
                <span class="admin-avatar" aria-hidden="true">
                    <svg viewBox="0 0 24 24" focusable="false">
                        <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5Z"/>
                    </svg>
                </span>
                <span>{{ session('admin_login') ? session('admin_username', 'Admin') : 'Admin' }}</span>
            </a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-copy">
                <div class="hero-label">UNIVERSITAS SRIWIJAYA</div>

                <h2>
                    Sampaikan Aspirasi,
                    <br>
                    <span>Wujudkan Perubahan.</span>
                </h2>

                <p class="hero-description">
                    Sistem Pengaduan & Aspirasi Mahasiswa Universitas Sriwijaya sebagai wadah untuk menyampaikan pengaduan,
                    kritik, saran, dan aspirasi mahasiswa.
                </p>

                <div class="hero-highlights" aria-label="Fitur layanan">
                    <div class="hero-highlight">
                        <span aria-hidden="true">✓</span>
                        Pengaduan dan aspirasi
                    </div>
                    <div class="hero-highlight">
                        <span aria-hidden="true">✓</span>
                        Pantau status laporan
                    </div>
                    <div class="hero-highlight">
                        <span aria-hidden="true">✓</span>
                        Untuk mahasiswa Unsri
                    </div>
                </div>
            </div>

            <aside class="hero-quicklinks" aria-label="Akses cepat layanan mahasiswa">
                <span class="hero-quicklinks-label">PUSAT LAYANAN MAHASISWA</span>
                <h3>Ada yang ingin disampaikan?</h3>
                <p>Pilih layanan yang sesuai dan sampaikan masukanmu dengan mudah.</p>

                <div class="hero-quicklinks-list">
                    <a href="{{ route('pengaduan') }}" class="hero-quicklink">
                        <span class="hero-quicklink-icon" aria-hidden="true">!</span>
                        <span class="hero-quicklink-text">Sampaikan Pengaduan</span>
                        <span class="hero-quicklink-arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('aspirasi') }}" class="hero-quicklink">
                        <span class="hero-quicklink-icon" aria-hidden="true">✎</span>
                        <span class="hero-quicklink-text">Kirim Aspirasi</span>
                        <span class="hero-quicklink-arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('lomba.index') }}" class="hero-quicklink">
                        <span class="hero-quicklink-icon" aria-hidden="true">🏆</span>
                        <span class="hero-quicklink-text">Pendaftaran Lomba</span>
                        <span class="hero-quicklink-arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('cek.status') }}" class="hero-quicklink">
                        <span class="hero-quicklink-icon" aria-hidden="true">✓</span>
                        <span class="hero-quicklink-text">Pantau Status Laporan</span>
                        <span class="hero-quicklink-arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </aside>
        </div>
    </section>

    <section class="voice-intro" aria-label="Cara menggunakan layanan">
        <div class="voice-intro-inner">
            <div class="voice-intro-heading">
                <span>Suara Mahasiswa</span>
                <h2>Satu langkah kecil untuk perubahan yang lebih baik.</h2>
            </div>

            <div class="voice-steps">
                <article class="voice-step">
                    <span class="voice-step-number">01</span>
                    <h3>Sampaikan</h3>
                    <p>Ajukan pengaduan atau aspirasi melalui layanan yang tersedia.</p>
                </article>
                <article class="voice-step">
                    <span class="voice-step-number">02</span>
                    <h3>Pantau</h3>
                    <p>Gunakan fitur cek status untuk mengetahui perkembangan laporan.</p>
                </article>
                <article class="voice-step">
                    <span class="voice-step-number">03</span>
                    <h3>Berkontribusi</h3>
                    <p>Masukanmu membantu membangun lingkungan kampus yang lebih baik.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="section-title">
            <h2>Layanan Informasi</h2>
            <p>Pilih informasi yang ingin kamu ketahui</p>
        </div>

        <div class="cards">
            <a href="#pengumuman-info" class="card card-pengumuman" data-info-dialog="pengumuman-info" aria-haspopup="dialog">
                <div class="card-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11v2a2 2 0 0 0 2 2h2l9 5V4l-9 5H5a2 2 0 0 0-2 2zM7 15l2 6h3l-2-5M18 9a4 4 0 0 1 0 6"/></svg></div>
                <h3>Pengumuman</h3>
                <p>Lihat informasi dan pengumuman terbaru dari Universitas Sriwijaya.</p>
                <span class="card-link">Lihat Pengumuman →</span>
            </a>

            <a href="#bantuan-info" class="card card-bantuan" data-info-dialog="bantuan-info" aria-haspopup="dialog">
                <div class="card-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 1 1 4.1 1.9c-1.1.9-1.6 1.4-1.6 2.6M12 17h.01"/></svg></div>
                <h3>Bantuan</h3>
                <p>Temukan bantuan dan panduan untuk menggunakan layanan sistem mahasiswa.</p>
                <span class="card-link">Lihat Bantuan →</span>
            </a>

            <a href="#tentang-info" class="card card-tentang" data-info-dialog="tentang-info" aria-haspopup="dialog">
                <div class="card-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg></div>
                <h3>Tentang Sistem</h3>
                <p>Kenali Sistem Pengaduan & Aspirasi Mahasiswa Universitas Sriwijaya.</p>
                <span class="card-link">Selengkapnya →</span>
            </a>
        </div>
    </section>

    <section class="faq-section" aria-labelledby="faq-title">
        <div class="faq-inner">
            <div class="section-title">
                <h2 id="faq-title">Pertanyaan yang Sering Ditanyakan</h2>
                <p>Jawaban singkat untuk membantu menggunakan layanan SIPAM.</p>
            </div>

            <div class="faq-list">
                <details class="faq-item">
                    <summary>Bagaimana cara menyampaikan pengaduan atau aspirasi?</summary>
                    <p class="faq-answer">
                        Pilih <a href="{{ route('pengaduan') }}">Form Pengaduan</a> untuk melaporkan masalah,
                        atau <a href="{{ route('aspirasi') }}">Form Aspirasi</a> untuk menyampaikan saran dan masukan.
                        Lengkapi data yang diminta sebelum mengirim.
                    </p>
                </details>

                <details class="faq-item">
                    <summary>Bagaimana cara melihat perkembangan laporan?</summary>
                    <p class="faq-answer">
                        Buka <a href="{{ route('cek.status') }}">Cek Status</a>, lalu masukkan NIM yang digunakan
                        saat mengirim pengaduan. Laporan yang cocok akan ditampilkan bersama statusnya.
                    </p>
                </details>

                <details class="faq-item">
                    <summary>Apa arti status laporan?</summary>
                    <p class="faq-answer">
                        <strong>Menunggu</strong> berarti laporan telah diterima dan menunggu tindak lanjut.
                        <strong>Diproses</strong> berarti laporan sedang ditangani.
                        <strong>Selesai</strong> berarti penanganan laporan telah diselesaikan.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <dialog class="info-dialog" id="pengumuman-info" aria-labelledby="pengumuman-info-title">
        <form method="dialog">
            <button class="info-dialog-close" aria-label="Tutup">×</button>
        </form>
        <h2 id="pengumuman-info-title">Pengumuman</h2>
        <p>Belum ada daftar pengumuman yang ditampilkan di halaman ini. Silakan pantau informasi resmi Universitas Sriwijaya untuk pengumuman kampus terbaru.</p>
    </dialog>

    <dialog class="info-dialog" id="bantuan-info" aria-labelledby="bantuan-info-title">
        <form method="dialog">
            <button class="info-dialog-close" aria-label="Tutup">×</button>
        </form>
        <h2 id="bantuan-info-title">Bantuan Layanan</h2>
        <p>Pilih layanan sesuai kebutuhanmu:</p>
        <ul>
            <li>Buat pengaduan untuk melaporkan kendala atau masalah.</li>
            <li>Kirim aspirasi untuk menyampaikan saran dan masukan.</li>
            <li>Cek status untuk memantau perkembangan pengaduan.</li>
        </ul>
        <div class="info-dialog-actions">
            <a href="{{ route('pengaduan') }}">Buat Pengaduan</a>
            <a href="{{ route('aspirasi') }}">Kirim Aspirasi</a>
            <a href="{{ route('cek.status') }}">Cek Status</a>
        </div>
    </dialog>

    <dialog class="info-dialog" id="tentang-info" aria-labelledby="tentang-info-title">
        <form method="dialog">
            <button class="info-dialog-close" aria-label="Tutup">×</button>
        </form>
        <h2 id="tentang-info-title">Tentang Sistem</h2>
        <p>Sistem Pengaduan & Aspirasi Mahasiswa Universitas Sriwijaya merupakan wadah bagi mahasiswa untuk menyampaikan pengaduan, kritik, saran, dan aspirasi. Gunakan layanan ini untuk membantu menyampaikan kebutuhan dan masukan secara terarah.</p>
    </dialog>

    <footer class="campus-footer" aria-label="Informasi Universitas Sriwijaya">
        <div class="campus-footer-inner">
            <div class="campus-footer-content">
                <section class="campus-footer-contact" aria-labelledby="campus-contact-title">
                    <h2 id="campus-contact-title">KONTAK KAMI</h2>
                    <div class="campus-footer-rule"></div>

                    <div class="campus-footer-brand">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Universitas Sriwijaya">
                        <h3>UNIVERSITAS<br>SRIWIJAYA</h3>
                    </div>

                    <p>
                        <span class="campus-footer-icon" aria-hidden="true">⌖</span>
                        <span>Jalan Palembang-Prabumulih,<br>KM 32 Inderalaya, Kabupaten Ogan Ilir,<br>Sumatera Selatan (30662)</span>
                    </p>
                    <p>
                        <span class="campus-footer-icon" aria-hidden="true">☎</span>
                        <a href="tel:+62711580739">0711-580739 / 0711-580740</a>
                    </p>
                    <p>
                        <span class="campus-footer-icon" aria-hidden="true">✉</span>
                        <a href="mailto:humas@unsri.ac.id">humas@unsri.ac.id</a>
                    </p>
                </section>

                <section class="campus-footer-location" aria-labelledby="campus-location-title">
                    <h2 id="campus-location-title">LOKASI KAMPUS</h2>
                    <div class="campus-footer-rule"></div>

                    <a href="https://www.google.com/maps/search/?api=1&amp;query=Universitas+Sriwijaya+Palembang" target="_blank" rel="noopener noreferrer">
                        <span aria-hidden="true">›</span> UNIVERSITAS SRIWIJAYA PALEMBANG
                    </a>
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=Universitas+Sriwijaya+Indralaya" target="_blank" rel="noopener noreferrer">
                        <span aria-hidden="true">›</span> UNIVERSITAS SRIWIJAYA INDERALAYA
                    </a>
                </section>
            </div>

            <div class="campus-footer-social" aria-label="Media sosial Universitas Sriwijaya">
                <span aria-label="Facebook">f</span>
                <span aria-label="X">𝕏</span>
                <span aria-label="Instagram">◎</span>
                <span aria-label="LinkedIn">in</span>
                <span aria-label="YouTube">▶</span>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('[data-info-dialog]').forEach((card) => {
            card.addEventListener('click', (event) => {
                event.preventDefault();

                const dialogId = card.getAttribute('data-info-dialog');
                const dialog = dialogId ? document.getElementById(dialogId) : null;

                if (dialog instanceof HTMLDialogElement) {
                    dialog.showModal();
                }
            });
        });

        document.querySelectorAll('.info-dialog').forEach((dialog) => {
            dialog.addEventListener('click', (event) => {
                if (event.target === dialog) {
                    dialog.close();
                }
            });
        });
    </script>

</body>
</html>
