<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - Sistem Pengaduan & Aspirasi Mahasiswa</title>

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

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #071d52, #0d5ca8, #1684cf);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1250px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
        }

        /* =========================
           BAGIAN KIRI
        ========================== */

        .left-section {
            position: relative;
            overflow: hidden;
            padding: 65px;
            color: white;
            background: linear-gradient(145deg, #09285f, #075aa7, #1684cf);

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .circle-one {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            top: -120px;
            left: -100px;
        }

        .circle-two {
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255, 193, 7, 0.08);
            bottom: -120px;
            right: -80px;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        /* LOGO UNSRI */

        .logo-container {
            width: 140px;
            height: 140px;
            background: white;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 35px;

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);

            overflow: hidden;
        }

        .logo-container img {
            width: 115px;
            height: 115px;
            object-fit: contain;
        }

        /* JUDUL */

        .left-section h1 {
            font-size: 42px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .yellow {
            color: #ffc928;
        }

        .left-section p {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
            max-width: 500px;
            margin-bottom: 35px;
        }

        .university {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding-top: 22px;
        }

        .university strong {
            display: block;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .university span {
            color: #ffc928;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* =========================
           BAGIAN KANAN
        ========================== */

        .right-section {
            background: #ffffff;
            padding: 65px 75px;

            display: flex;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 500px;
            margin: auto;
        }

        .login-box h2 {
            font-size: 40px;
            color: #08285e;
            margin-bottom: 12px;
            font-weight: 800;
        }

        .login-subtitle {
            color: #6c7890;
            font-size: 17px;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        /* ERROR */

        .alert {
            background: #fff1f1;
            color: #c62828;
            border: 1px solid #ffcaca;
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: 700;
            color: #102957;
            margin-bottom: 10px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper span {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .input-wrapper input {
            width: 100%;
            height: 58px;

            border: 1px solid #d8dfeb;
            border-radius: 12px;

            padding: 0 18px 0 52px;

            font-size: 16px;

            outline: none;

            transition: 0.25s;
        }

        .input-wrapper input:focus {
            border-color: #126ec1;

            box-shadow:
                0 0 0 4px rgba(18, 110, 193, 0.1);
        }

        /* BUTTON */

        .btn-login {
            width: 100%;
            height: 60px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #0865b5,
                #1387d4
            );

            color: white;

            font-size: 17px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.25s;

            margin-top: 5px;

            box-shadow:
                0 10px 25px rgba(8, 101, 181, 0.25);
        }

        .btn-login:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(8, 101, 181, 0.35);
        }

        /* KEMBALI */

        .back-link {
            display: block;

            text-align: center;

            margin-top: 28px;

            color: #0865b5;

            text-decoration: none;

            font-weight: 700;

            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            body {
                padding: 15px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .left-section {
                padding: 45px 35px;
            }

            .right-section {
                padding: 45px 35px;
            }

            .left-section h1 {
                font-size: 32px;
            }

            .login-box h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 500px) {

            body {
                min-height: 100vh;
                padding: 12px;
                align-items: flex-start;
            }

            .login-wrapper {
                min-height: 0;
                border-radius: 20px;
            }

            .left-section {
                padding: 30px 24px;
            }

            .logo-container {
                width: 110px;
                height: 110px;
                margin-bottom: 22px;
            }

            .logo-container img {
                width: 90px;
                height: 90px;
            }

            .left-section h1 {
                font-size: 27px;
            }

            .left-section p {
                font-size: 15px;
            }

            .right-section {
                padding: 35px 22px;
            }

            .login-box h2 {
                font-size: clamp(26px, 8vw, 32px);
            }
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/sipam-theme.css') }}">
</head>

<body>

<div class="login-wrapper">

    <!-- =========================
         BAGIAN KIRI
    ========================== -->

    <section class="left-section">

        <div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="left-content">

            <!-- LOGO UNSRI -->

            <div class="logo-container">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo Universitas Sriwijaya"
                >

            </div>


            <!-- JUDUL -->

            <h1>

                Sistem Pengaduan
                <span class="yellow">&amp;</span>

                <br>

                Aspirasi Mahasiswa

            </h1>


            <!-- DESKRIPSI -->

            <p>

                Panel administrator untuk mengelola pengaduan
                dan aspirasi mahasiswa Universitas Sriwijaya
                secara terintegrasi.

            </p>


            <!-- UNIVERSITAS -->

            <div class="university">

                <strong>
                    Universitas Sriwijaya
                </strong>

                <span>
                    SISTEM PENGADUAN &amp; ASPIRASI MAHASISWA
                </span>

            </div>

        </div>

    </section>


    <!-- =========================
         BAGIAN KANAN
    ========================== -->

    <section class="right-section">

        <div class="login-box">

            <h2>
                Login Admin
            </h2>

            <p class="login-subtitle">

                Silakan masuk untuk mengakses dashboard
                administrator.

            </p>


            <!-- PESAN ERROR -->

            @if(session('error'))

                <div class="alert">

                    {{ session('error') }}

                </div>

            @endif


            <!-- FORM LOGIN -->

            <form
                method="POST"
                action="{{ url('/admin/login') }}"
            >

                @csrf


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <div class="input-wrapper">

                        <span>👤</span>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan username"
                            required
                            autocomplete="username"
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span>🔒</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="btn-login"
                >

                    Masuk ke Dashboard

                </button>

            </form>


            <!-- KEMBALI -->

            <a
                href="{{ url('/') }}"
                class="back-link"
            >

                ← Kembali ke Website Utama
</a>
        </div>

    </section>

</div>

</body>
</html>