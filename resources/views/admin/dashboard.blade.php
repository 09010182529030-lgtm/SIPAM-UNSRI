<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | Sistem Pengaduan & Aspirasi Mahasiswa</title>

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
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f3f7fc;
            color: #12345b;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 275px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            scrollbar-width: thin;

            background: linear-gradient(
                180deg,
                #062c5c 0%,
                #07529a 55%,
                #0874c9 100%
            );

            color: white;
            padding: 30px 20px;

            box-shadow: 5px 0 25px rgba(0, 60, 120, 0.12);

            z-index: 1000;
        }

        .logo-area {
            text-align: center;
            padding-bottom: 28px;
            border-bottom: 1px solid rgba(255,255,255,0.18);
        }

        .logo-circle {
            width: 82px;
            height: 82px;
            border-radius: 50%;

            background: white;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            overflow: hidden;
        }

        .logo-circle img {
            width: 70px;
            height: 70px;

            object-fit: contain;
            display: block;
        }

        .logo-area h2 {
            font-size: 19px;
            line-height: 1.4;
            font-weight: 700;
        }

        .logo-area p {
            margin-top: 8px;
            color: #d9eaff;
            font-size: 13px;
        }

        .menu {
            margin-top: 30px;
            flex: 0 0 auto;
        }

        .menu-title {
            font-size: 11px;
            letter-spacing: 2px;
            color: #b8d9f8;
            margin: 0 14px 14px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;

            text-decoration: none;
            color: #edf6ff;

            padding: 14px 15px;
            margin-bottom: 7px;

            border-radius: 12px;

            font-size: 14px;
            font-weight: 600;

            transition: 0.25s;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.13);
            transform: translateX(4px);
        }

        .menu a.active {
            background: linear-gradient(
                90deg,
                rgba(255,255,255,0.22),
                rgba(255,255,255,0.08)
            );

            box-shadow: inset 4px 0 #ffc400;
        }

        .menu-icon {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,0.12);

            font-size: 16px;
        }

        .logout-area {
            position: relative;
            inset: auto;
            flex: 0 0 auto;
            margin: auto 0 5px;
            padding-top: 18px;
        }

        .logout-button {
            width: 100%;

            border: 1px solid rgba(255,255,255,0.2);

            background: rgba(255,255,255,0.08);

            color: white;

            padding: 12px;

            border-radius: 10px;

            cursor: pointer;

            font-weight: 600;

            transition: 0.25s;
        }

        .logout-button:hover {
            background: #dc3545;
            border-color: #dc3545;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 275px;
            min-height: 100vh;
            padding: 32px 42px;
        }

        /* HEADER */

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 28px;
        }

        .header-text h1 {
            font-size: 31px;
            color: #082f63;
            margin-bottom: 7px;
        }

        .header-text p {
            color: #7186a0;
            font-size: 14px;
        }

        .admin-profile {
            display: flex;
            align-items: center;

            gap: 12px;

            background: white;

            padding: 9px 15px;

            border-radius: 14px;

            box-shadow: 0 5px 20px rgba(0,60,120,0.07);
        }

        .admin-avatar {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #07529a,
                #0b83db
            );

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;
        }

        .admin-profile strong {
            display: block;
            font-size: 13px;
            color: #153b66;
        }

        .admin-profile span {
            font-size: 11px;
            color: #8395aa;
        }

        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success-message {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #e7f8ef;
            color: #087a4b;
            border: 1px solid #b8ead1;
            padding: 16px 18px;
            border-radius: 14px;
            margin-bottom: 22px;
            box-shadow: 0 8px 22px rgba(0,100,60,0.09);
        }

        .success-icon {
            display: inline-flex;
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #c9f0da;
            font-size: 20px;
            font-weight: 800;
        }

        .success-message strong {
            display: block;
            margin-bottom: 3px;
            font-size: 15px;
        }

        .success-message p {
            color: #287752;
            font-size: 13px;
            line-height: 1.5;
        }

        .error-message {
            background: #fff0f0;
            color: #b42318;

            border: 1px solid #f2c3c3;

            padding: 14px 18px;

            border-radius: 12px;

            margin-bottom: 22px;

            font-size: 14px;
            font-weight: 600;
        }

        /* =========================
           WELCOME
        ========================= */

        .welcome-banner {
            position: relative;
            overflow: hidden;

            background: linear-gradient(
                120deg,
                #06376e,
                #0872c7
            );

            border-radius: 20px;

            padding: 27px 32px;

            color: white;

            margin-bottom: 27px;

            box-shadow: 0 12px 30px rgba(0,76,150,0.18);
        }

        .welcome-banner::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            border: 35px solid rgba(255,255,255,0.06);

            right: -70px;
            top: -100px;
        }

        .welcome-banner h2 {
            font-size: 23px;
            margin-bottom: 7px;
        }

        .welcome-banner p {
            color: #dceeff;
            font-size: 14px;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 28px;
        }

        .stat-card {
            background: white;

            border-radius: 17px;

            padding: 21px;

            box-shadow: 0 7px 25px rgba(0,50,100,0.07);

            position: relative;

            overflow: hidden;

            transition: 0.25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);

            box-shadow: 0 12px 30px rgba(0,50,100,0.11);
        }

        .stat-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 5px;
            height: 100%;

            background: #0872c7;
        }

        .stat-icon {
            width: 44px;
            height: 44px;

            border-radius: 12px;

            background: #e8f3ff;

            color: #0767b5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 19px;

            margin-bottom: 15px;
        }

        .stat-card:nth-child(2)::before {
            background: #0872c7;
        }

        .stat-card:nth-child(2) .stat-icon {
            background: #e8f3ff;
            color: #0767b5;
        }

        .stat-card:nth-child(3)::before {
            background: #0ca678;
        }

        .stat-card:nth-child(3) .stat-icon {
            background: #e2f8f0;
            color: #07966b;
        }

        .stat-card:nth-child(4)::before {
            background: #7657c8;
        }

        .stat-card:nth-child(4) .stat-icon {
            background: #f0ebff;
            color: #6846b5;
        }

        .stat-card h4 {
            font-size: 13px;
            color: #71849b;
            margin-bottom: 5px;
        }

        .stat-card .number {
            font-size: 29px;
            font-weight: 800;
            color: #083d78;
        }

        .chart-card {
            background: white;
            border-radius: 19px;
            padding: 25px;
            margin-bottom: 27px;
            box-shadow: 0 7px 25px rgba(0,50,100,0.06);
        }

        .chart-header {
            margin-bottom: 24px;
        }

        .chart-header h2 {
            color: #083d78;
            font-size: 20px;
        }

        .chart-header p {
            color: #8395aa;
            font-size: 12px;
            margin-top: 5px;
        }

        .chart-list {
            display: grid;
            gap: 20px;
        }

        .chart-row {
            display: grid;
            grid-template-columns: 180px minmax(80px, 1fr) 45px;
            align-items: center;
            gap: 14px;
        }

        .chart-label {
            color: #294b70;
            font-size: 13px;
            font-weight: 600;
        }

        .chart-track {
            height: 18px;
            overflow: hidden;
            border-radius: 999px;
            background: linear-gradient(90deg, #edf2f8 0%, #f4f7fb 100%);
            border: 1px solid rgba(17, 52, 89, 0.04);
            box-shadow: inset 0 1px 2px rgba(11, 35, 64, 0.06);
        }

        .chart-fill {
            height: 100%;
            min-width: 0;
            border-radius: inherit;
            transition: width .3s ease;
            box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.2);
        }

        .chart-fill-incoming {
            background-color: #f59e0b;
        }

        .chart-fill-processing {
            background-color: #3b82f6;
        }

        .chart-fill-completed {
            background-color: #10b981;
        }

        .chart-fill-aspirations {
            background-color: #8b5cf6;
        }

        .chart-value {
            color: #083d78;
            font-size: 14px;
            font-weight: 800;
            text-align: right;
        }

        /* =========================
           CONTENT CARD
        ========================= */

        .content-card {
            background: white;

            border-radius: 19px;

            padding: 25px;

            margin-bottom: 27px;

            box-shadow: 0 7px 25px rgba(0,50,100,0.06);
        }

        .card-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 21px;
        }

        .card-header h2 {
            color: #083d78;
            font-size: 20px;
        }

        .card-header p {
            color: #8395aa;
            font-size: 12px;

            margin-top: 5px;
        }

        .see-all {
            text-decoration: none;

            background: #edf6ff;

            color: #0767b5;

            padding: 9px 14px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 700;
        }

        .evidence-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: max-content;
            min-width: max-content;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .report-filters {
            display: flex;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
            padding: 16px;
            border-radius: 12px;
            background: #f7faff;
        }

        .report-count {
            margin: 0 0 14px;
            color: #8395aa;
            font-size: 12px;
        }

        .report-filter-field {
            flex: 1 1 220px;
        }

        .report-filter-field label {
            display: block;
            margin-bottom: 7px;
            color: #55708d;
            font-size: 11px;
            font-weight: 700;
        }

        .report-filter-field input,
        .report-filter-field select {
            width: 100%;
            min-height: 40px;
            padding: 9px 11px;
            border: 1px solid #dce6ef;
            border-radius: 8px;
            background: white;
            color: #315373;
            font-size: 12px;
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .filter-actions .save-button {
            min-height: 40px;
        }

        .filter-reset {
            display: inline-flex;
            align-items: center;
            min-height: 40px;
            padding: 0 12px;
            border-radius: 8px;
            background: #edf2f8;
            color: #55708d;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .report-details {
            min-width: 150px;
        }

        .report-details summary {
            color: #0767b5;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .report-detail-body {
            max-width: 420px;
            margin-top: 10px;
            padding: 12px;
            border: 1px solid #e3ebf4;
            border-radius: 10px;
            background: #f8fbff;
            white-space: normal;
            overflow-wrap: anywhere;
        }

        .report-detail-body p {
            margin-bottom: 8px;
            line-height: 1.55;
        }

        .report-detail-body p:last-child {
            margin-bottom: 0;
        }

        .report-history {
            margin: 6px 0 0 18px;
            color: #55708d;
            line-height: 1.6;
        }

        .announcement-form {
            display: grid;
            gap: 14px;
            margin-top: 18px;
        }

        .announcement-form label {
            display: block;
            margin-bottom: 7px;
            color: #55708d;
            font-size: 12px;
            font-weight: 700;
        }

        .announcement-form input,
        .announcement-form textarea {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #dce6ef;
            border-radius: 9px;
            color: #315373;
            font: inherit;
            font-size: 13px;
        }

        .announcement-form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .announcement-warning {
            padding: 12px 14px;
            border-radius: 10px;
            background: #fff8e3;
            color: #765c16;
            font-size: 12px;
            line-height: 1.6;
        }

        .announcement-admin-list {
            display: grid;
            gap: 12px;
            margin-top: 22px;
        }

        .announcement-admin-item {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 15px;
            border: 1px solid #e5ebf3;
            border-radius: 12px;
            background: #f8fbff;
        }

        .announcement-admin-item h3 {
            color: #123e6c;
            font-size: 14px;
        }

        .announcement-admin-item p {
            margin-top: 6px;
            color: #526982;
            font-size: 13px;
            line-height: 1.6;
            white-space: pre-line;
        }

        .announcement-admin-item time {
            display: block;
            margin-top: 7px;
            color: #8395aa;
            font-size: 11px;
        }

        .competition-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .competition-form .full-width {
            grid-column: 1 / -1;
        }

        .competition-form label {
            display: block;
            margin-bottom: 7px;
            color: #55708d;
            font-size: 12px;
            font-weight: 700;
        }

        .competition-form input,
        .competition-form textarea {
            width: 100%;
            min-height: 40px;
            padding: 11px 12px;
            border: 1px solid #dce6ef;
            border-radius: 9px;
            color: #315373;
            font: inherit;
            font-size: 13px;
        }

        .competition-form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .competition-active {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #55708d;
            font-size: 13px;
        }

        .competition-active input {
            width: 17px;
            min-height: 17px;
            accent-color: #0872c7;
        }

        .competition-admin-list {
            display: grid;
            gap: 12px;
            margin-top: 22px;
        }

        .competition-admin-item {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 15px;
            border: 1px solid #e5ebf3;
            border-radius: 12px;
            background: #f8fbff;
        }

        .competition-admin-item h3 {
            color: #123e6c;
            font-size: 14px;
        }

        .competition-admin-item p {
            margin-top: 6px;
            color: #526982;
            font-size: 13px;
            line-height: 1.6;
            white-space: pre-line;
        }

        .competition-admin-item time,
        .competition-admin-item a {
            display: inline-block;
            margin: 7px 10px 0 0;
            color: #0872c7;
            font-size: 11px;
        }

        .competition-active-status {
            display: inline-block;
            margin-top: 8px;
            padding: 4px 8px;
            border-radius: 20px;
            background: #e4f8ef;
            color: #07845f;
            font-size: 11px;
            font-weight: 700;
        }

        .competition-active-status.inactive {
            background: #edf2f8;
            color: #71849b;
        }

        .announcement-delete {
            flex: 0 0 auto;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f6fc;

            color: #55708d;

            text-align: left;

            padding: 14px;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }

        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        th:last-child {
            border-radius: 0 10px 10px 0;
        }

        td {
            padding: 16px 14px;

            border-bottom: 1px solid #edf1f5;

            font-size: 13px;

            color: #294b70;
        }

        tr:hover td {
            background: #fafcff;
        }

        .student {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .student-avatar {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            background: #e8f3ff;

            color: #0767b5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;

            font-size: 12px;
        }

        .student-name {
            font-weight: 700;
            color: #123e6c;
        }

        .student-nim {
            display: block;

            color: #91a1b3;

            font-size: 10px;

            margin-top: 2px;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;
        }

        .status::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;
        }

        .status-menunggu {
            background: #fff5d8;
            color: #a97800;
        }

        .status-menunggu::before {
            background: #e9ac00;
        }

        .status-proses {
            background: #e8f3ff;
            color: #0767b5;
        }

        .status-proses::before {
            background: #0872c7;
        }

        .status-selesai {
            background: #e4f8ef;
            color: #07845f;
        }

        .status-selesai::before {
            background: #0ca678;
        }

        .status-ditolak {
            background: #ffe5e5;
            color: #b42318;
        }

        .status-ditolak::before {
            background: #dc3545;
        }

        /* =========================
           FORM STATUS
        ========================= */

        .status-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            min-width: 330px;
        }

        .status-form input,
        .status-form select {
            min-height: 42px;
            padding: 10px 12px;
            border: 1px solid #d8e3f0;
            border-radius: 10px;
            color: #20466e;
            background: #fbfcff;
            font-size: 11px;
            outline: none;
            box-shadow: inset 0 1px 2px rgba(17, 52, 89, 0.03);
        }

        .status-form select {
            min-width: 140px;
            background: linear-gradient(180deg, #ffffff 0%, #f4f9ff 100%);
            cursor: pointer;
            appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, #1d5fa8 50%),
                linear-gradient(135deg, #1d5fa8 50%, transparent 50%),
                linear-gradient(to right, #ffffff, #ffffff);
            background-position:
                calc(100% - 18px) calc(50% - 2px),
                calc(100% - 12px) calc(50% - 2px),
                0 0;
            background-size: 6px 6px, 6px 6px, 100% 100%;
            background-repeat: no-repeat;
            padding-right: 34px;
        }

        .status-form input {
            width: 220px;
            min-width: 150px;
        }

        .status-next {
            color: #55708d;
            font-size: 11px;
            font-weight: 700;
        }

        .save-button {
            border: none;
            background: linear-gradient(135deg, #0767b5, #0a7cd3);
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,100,190,0.15);
            transition: 0.2s;
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,100,190,0.22);
        }

        .status-form input:focus,
        .status-form select:focus {
            border-color: #0872c7;
            box-shadow: 0 0 0 3px rgba(8, 114, 199, 0.12);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;

            padding: 10px;

            color: #91a1b3;

            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 1100px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar {
                width: 230px;
            }

            .main {
                margin-left: 230px;
                padding: 25px;
            }
        }

        @media(max-width: 1100px) {

            .sidebar {
                position: relative;
                display: flex;
                flex-direction: column;
                width: 100%;
                height: auto;
                padding: 20px 16px;
            }

            .logo-area {
                padding-bottom: 18px;
            }

            .logo-circle {
                width: 56px;
                height: 56px;
                margin-bottom: 8px;
            }

            .logo-circle img {
                width: 48px;
                height: 48px;
            }

            .logo-area h2 {
                font-size: 15px;
                line-height: 1.3;
            }

            .menu {
                margin-top: 12px;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-auto-flow: row;
                gap: 4px 8px;
                width: 100%;
            }

            .menu-title {
                grid-column: 1 / -1;
                margin-bottom: 8px;
            }

            .menu a {
                gap: 8px;
                padding: 10px 8px;
                font-size: 12px;
            }

            .menu-icon {
                width: 30px;
                height: 30px;
                flex: 0 0 30px;
            }

            .sidebar .logout-area {
                position: relative;
                inset: auto;
                width: 100%;
                margin-top: 16px;
                padding-top: 0;
                flex: 0 0 auto;
            }

            .sidebar > .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                width: 100%;
            }

            .sidebar > .menu > .menu-title {
                grid-column: 1 / -1;
            }

            .sidebar > .logout-area,
            .sidebar > .logout-area form {
                width: 100%;
            }

            .sidebar > .logout-area {
                align-self: stretch;
            }

            .main {
                margin-left: 0;
                padding: 22px 16px;
                min-width: 0;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .stat-card {
                min-width: 0;
                padding: 16px 14px;
            }

            .stat-card h4 {
                line-height: 1.4;
            }

            .stat-card .number {
                font-size: 26px;
            }

            .top-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .header-text h1 {
                font-size: 26px;
            }

            .content-card,
            .welcome-banner,
            .chart-card {
                padding: 20px 16px;
            }

            .competition-form {
                grid-template-columns: 1fr;
            }

            .competition-form .full-width {
                grid-column: auto;
            }

            .competition-admin-item {
                flex-direction: column;
            }

            .chart-row {
                grid-template-columns: minmax(0, 1fr) 42px;
                gap: 8px;
            }

            .chart-label {
                grid-column: 1 / -1;
            }

            .chart-track {
                grid-column: 1;
            }

            .chart-value {
                grid-column: 2;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .table-wrapper {
                max-width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #9bb6d3 #edf2f8;
            }

            .table-wrapper::-webkit-scrollbar {
                display: block;
                height: 6px;
            }

            .table-wrapper::-webkit-scrollbar-track {
                background: #edf2f8;
                border-radius: 6px;
            }

            .table-wrapper::-webkit-scrollbar-thumb {
                background: #9bb6d3;
                border-radius: 6px;
            }

            table {
                min-width: 720px;
            }
        }

        @media(max-width: 420px) {
            .main {
                padding: 18px 12px;
            }

            .sidebar {
                padding: 18px 12px;
            }

            .menu a {
                font-size: 11px;
            }
        }

        @media(max-width: 340px) {
            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/sipam-theme.css') }}">
</head>


<body>

    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <div class="logo-area">

            <div class="logo-circle">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo Universitas Sriwijaya"
                >

            </div>

            <h2>
                Sistem Pengaduan<br>
                & Aspirasi Mahasiswa
            </h2>

            <p>
                Universitas Sriwijaya
            </p>

        </div>


        <div class="menu">

            <div class="menu-title">
                Admin Panel
            </div>


            <a href="{{ route('admin.dashboard') }}" class="active">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="1.5"/><rect x="13" y="3" width="8" height="5" rx="1.5"/><rect x="13" y="10" width="8" height="11" rx="1.5"/><rect x="3" y="13" width="8" height="8" rx="1.5"/></svg>
                </span>

                Dashboard

            </a>


            <a href="/">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/></svg>
                </span>

                Website Utama

            </a>


            <a href="/pengaduan">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M8 13h8M8 17h6"/></svg>
                </span>

                Form Pengaduan

            </a>


            <a href="/aspirasi">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18h6M10 22h4M8.5 14.5A7 7 0 1 1 15.5 14.5c-.9.8-1.5 1.7-1.5 2.5h-4c0-.8-.6-1.7-1.5-2.5z"/></svg>
                </span>

                Form Aspirasi

            </a>


            <a href="/cek-status">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5M4 19h17"/><path d="M8 15v-4M13 15V7M18 15V3"/></svg>
                </span>

                Cek Status

            </a>

            <a href="{{ route('transparansi') }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3v18h18"/><path d="m7 14 4-4 3 3 6-7M16 6h4v4"/></svg>
                </span>

                Transparansi Publik

            </a>

            <a href="#announcements">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11v2a2 2 0 0 0 2 2h2l9 5V4l-9 5H5a2 2 0 0 0-2 2zM7 15l2 6h3l-2-5M18 9a4 4 0 0 1 0 6"/></svg>
                </span>

                Pengumuman

            </a>

            <a href="#lombas">

                <span class="menu-icon" aria-hidden="true">🏆</span>

                Pendaftaran Lomba

            </a>

        </div>


        <!-- LOGOUT -->

        <div class="logout-area">

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    ⇥ &nbsp; Keluar dari Admin
                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================= -->

    <main class="main">


        <!-- HEADER -->

        <div class="top-header">

            <div class="header-text">

                <h1>
                    Dashboard Admin
                </h1>

                <p>
                    Kelola pengaduan dan aspirasi mahasiswa Universitas Sriwijaya
                </p>

            </div>


            <div class="admin-profile">

                <div class="admin-avatar">
                    A
                </div>

                <div>

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        Admin Sistem
                    </span>

                </div>

            </div>

        </div>


        <!-- =========================
             PESAN BERHASIL
        ========================= -->

        @if(session('success'))

            <div class="success-message" role="status" aria-live="polite">
                <span class="success-icon" aria-hidden="true">✓</span>
                <div>
                    <strong>Data berhasil disimpan</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>

        @endif


        @if(session('error') || $errors->any())

            <div class="error-message">

                ✕ {{ session('error') ?? $errors->first() }}

            </div>

        @endif


        <!-- =========================
             WELCOME
        ========================= -->

        <section class="welcome-banner">

            <h2>
                Selamat Datang, Administrator 👋
            </h2>

            <p>
                Pantau dan kelola seluruh pengaduan serta aspirasi mahasiswa
                melalui halaman administrasi ini.
            </p>

        </section>


        <!-- =========================
             STATISTIK
        ========================= -->

        <section class="stats">


            <!-- PENGADUAN MASUK -->

            <div class="stat-card">

                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                </div>

                <h4>
                    Pengaduan Masuk
                </h4>

                <div class="number">
                    {{ $statistics['incoming'] }}
                </div>

            </div>


            <!-- PENGADUAN DIPROSES -->

            <div class="stat-card">

                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 7v5h-5M4 17v-5h5"/><path d="M5.6 9A7 7 0 0 1 18 6l2 6M4 12l2 6a7 7 0 0 0 12.4-3"/></svg>
                </div>

                <h4>
                    Pengaduan Diproses
                </h4>

                <div class="number">
                    {{ $statistics['processing'] }}
                </div>

            </div>


            <!-- PENGADUAN SELESAI -->

            <div class="stat-card">

                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="m8 12 2.5 2.5L16 9"/></svg>
                </div>

                <h4>
                    Pengaduan Selesai
                </h4>

                <div class="number">
                    {{ $statistics['completed'] }}
                </div>

            </div>


            <!-- TOTAL ASPIRASI -->

            <div class="stat-card">

                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18h6M10 22h4M8.5 14.5A7 7 0 1 1 15.5 14.5c-.9.8-1.5 1.7-1.5 2.5h-4c0-.8-.6-1.7-1.5-2.5z"/></svg>
                </div>

                <h4>
                    Aspirasi Mahasiswa
                </h4>

                <div class="number">
                    {{ $statistics['aspirations'] }}
                </div>

            </div>

        </section>

        <section class="chart-card" aria-labelledby="report-chart-title">
            <div class="chart-header">
                <h2 id="report-chart-title">Ringkasan Kondisi Laporan</h2>
                <p>Perbandingan jumlah pengaduan dan aspirasi mahasiswa</p>
            </div>

            <div class="chart-list" role="list">
                @foreach($chartData as $item)
                    <div class="chart-row" role="listitem" aria-label="{{ $item['label'] }}: {{ $item['value'] }}">
                        <span class="chart-label">{{ $item['label'] }}</span>
                        <div
                            class="chart-track"
                            role="progressbar"
                            aria-label="{{ $item['label'] }}"
                            aria-valuemin="0"
                            aria-valuemax="{{ $maxChartValue }}"
                            aria-valuenow="{{ $item['value'] }}"
                        >
                            <div
                                class="chart-fill"
                                style="width: {{ ($item['value'] / $maxChartValue) * 100 }}%; background: {{ $item['color'] }} !important; background-image: none !important;"
                            ></div>
                        </div>
                        <span class="chart-value">{{ $item['value'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- =========================
             DATA PENGADUAN
        ========================= -->

        <section class="content-card">


            <div class="card-header">

                <div>

                    <h2>
                        Data Pengaduan
                    </h2>

                    <p>
                        Daftar laporan pengaduan mahasiswa
                    </p>

                </div>


                <a
                    href="/pengaduan"
                    class="see-all"
                >
                    + Pengaduan Baru
                </a>

            </div>


            <form action="{{ route('admin.dashboard') }}" method="GET" class="report-filters">
                <div class="report-filter-field">
                    <label for="report-search">Cari berdasarkan NIM atau kategori</label>
                    <input
                        id="report-search"
                        type="search"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Masukkan NIM atau kategori"
                    >
                </div>

                <div class="report-filter-field">
                    <label for="report-status">Filter status</label>
                    <select id="report-status" name="status_filter">
                        <option value="">Semua status</option>
                        @foreach(['Dikirim', 'Diverifikasi', 'Diproses', 'Selesai', 'Ditolak'] as $statusOption)
                            <option value="{{ $statusOption }}" {{ $statusFilter === $statusOption ? 'selected' : '' }}>
                                {{ $statusOption }}
                            </option>
                        @endforeach
                        @if($statusFilter === 'Menunggu')
                            <option value="Menunggu" selected>Menunggu (status lama)</option>
                        @endif
                    </select>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="save-button">Terapkan</button>
                    <a href="{{ route('admin.dashboard') }}" class="filter-reset">Reset</a>
                </div>
            </form>

            <p class="report-count">
                Menampilkan {{ $pengaduan->count() }} laporan
                @if($search !== '' || $statusFilter !== '')
                    sesuai filter.
                @else
                    pengaduan.
                @endif
            </p>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Mahasiswa
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Bukti
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($pengaduan as $item)

                            <tr>

                                <!-- MAHASISWA -->

                                <td>

                                    <div class="student">

                                        <div class="student-avatar">

                                            {{ strtoupper(substr($item->nama, 0, 1)) }}

                                        </div>


                                        <div>

                                            <div class="student-name">
                                                {{ $item->nama }}
                                            </div>

                                            <span class="student-nim">
                                                NIM: {{ $item->nim }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <!-- KATEGORI -->

                                <td>
                                    {{ $item->kategori }}
                                </td>


                                <!-- JUDUL -->

                                <td>
                                    <strong>{{ $item->judul }}</strong>
                                    <details class="report-details">
                                        <summary>Lihat detail</summary>
                                        <div class="report-detail-body">
                                            <p><strong>Isi pengaduan:</strong> {{ $item->isi }}</p>
                                            <p><strong>Dikirim:</strong> {{ $item->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB</p>
                                            @if($item->statusHistories->isNotEmpty())
                                                <p><strong>Riwayat tindak lanjut:</strong></p>
                                                <ul class="report-history">
                                                    @foreach($item->statusHistories as $history)
                                                        <li>
                                                            {{ $history->status }} —
                                                            {{ $history->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB
                                                            @if($history->note)
                                                                : {{ $history->note }}
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </details>
                                </td>

                                <td>
                                    @if($item->evidence_path)
                                        <a
                                            class="see-all evidence-download"
                                            href="{{ URL::temporarySignedRoute('pengaduan.evidence', now()->addMinutes(30), ['pengaduan' => $item->id]) }}"
                                        >
                                            Unduh bukti
                                        </a>
                                    @else
                                        <span class="student-nim">Tidak ada</span>
                                    @endif
                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($item->status == 'Menunggu' || $item->status == 'Dikirim')

                                        <span class="status status-menunggu">
                                            Dikirim
                                        </span>

                                    @elseif($item->status == 'Diverifikasi' || $item->status == 'Diproses')

                                        <span class="status status-proses">
                                            {{ $item->status }}
                                        </span>

                                    @elseif($item->status == 'Selesai')

                                        <span class="status status-selesai">
                                            Selesai
                                        </span>

                                    @elseif($item->status == 'Ditolak')

                                        <span class="status status-ditolak">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="status status-menunggu">
                                            {{ $item->status }}
                                        </span>

                                    @endif

                                </td>


                                <!-- AKSI -->

                                <td>

                                    @php
                                        $nextStatus = match ($item->status) {
                                            'Menunggu', 'Dikirim' => 'Diverifikasi',
                                            'Diverifikasi' => 'Diproses',
                                            'Diproses' => 'Selesai',
                                            default => null,
                                        };
                                    @endphp

                                    @if($nextStatus)
                                        <form
                                            action="{{ route('admin.pengaduan.status', $item->id) }}"
                                            method="POST"
                                            class="status-form"
                                        >
                                            @csrf
                                            <input type="hidden" name="search" value="{{ $search }}">
                                            <input type="hidden" name="status_filter" value="{{ $statusFilter }}">
                                            <select
                                                name="status"
                                                aria-label="Ubah status pengaduan {{ $item->judul }}"
                                                onchange="const note = this.form.querySelector('[name=note]'); if (!note.value.trim()) { note.value = this.value === 'Selesai' ? 'Laporan telah selesai ditangani.' : 'Laporan sedang ditindaklanjuti.'; } this.form.submit();"
                                            >
                                                <option value="{{ $nextStatus }}" selected>{{ $nextStatus }}</option>
                                            </select>
                                            <input
                                                type="text"
                                                name="note"
                                                maxlength="1000"
                                                placeholder="{{ $nextStatus === 'Selesai' ? 'Catatan penyelesaian' : 'Catatan tindak lanjut' }}"
                                                aria-label="{{ $nextStatus === 'Selesai' ? 'Catatan penyelesaian' : 'Catatan tindak lanjut' }} untuk {{ $item->judul }}"
                                                value="{{ $nextStatus === 'Selesai' ? 'Laporan telah selesai ditangani.' : 'Laporan sedang ditindaklanjuti.' }}"
                                                required
                                            >
                                        </form>
                                    @else
                                        <span class="status-next">Tidak ada tahap lanjutan</span>
                                    @endif

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    style="text-align:center; padding:35px;"
                                >
                                    @if($search !== '' || $statusFilter !== '')
                                        Tidak ada pengaduan yang sesuai dengan pencarian atau filter.
                                    @else
                                        Belum ada data pengaduan.
                                    @endif
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <!-- =========================
             DATA ASPIRASI
        ========================= -->

        <section class="content-card">


            <div class="card-header">

                <div>

                    <h2>
                        Data Aspirasi
                    </h2>

                    <p>
                        Daftar aspirasi dan masukan mahasiswa
                    </p>

                </div>


                <a
                    href="/aspirasi"
                    class="see-all"
                >
                    + Aspirasi Baru
                </a>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Mahasiswa
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($aspirasi as $item)

                            <tr>

                                <!-- MAHASISWA -->

                                <td>

                                    <div class="student">

                                        <div class="student-avatar">

                                            {{ strtoupper(substr($item->nama, 0, 1)) }}

                                        </div>


                                        <div>

                                            <div class="student-name">
                                                {{ $item->nama }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <!-- KATEGORI -->

                                <td>
                                    {{ $item->kategori ?? 'Umum' }}
                                </td>


                                <!-- JUDUL -->

                                <td>
                                    {{ $item->judul }}
                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($item->status == 'Menunggu')

                                        <span class="status status-menunggu">
                                            Menunggu
                                        </span>

                                    @elseif($item->status == 'Diproses')

                                        <span class="status status-proses">
                                            Diproses
                                        </span>

                                    @elseif($item->status == 'Selesai')

                                        <span class="status status-selesai">
                                            Selesai
                                        </span>

                                    @else

                                        <span class="status status-menunggu">
                                            {{ $item->status }}
                                        </span>

                                    @endif

                                </td>


                                <!-- AKSI -->

                                <td>

                                    <form
                                        action="{{ route('admin.aspirasi.status', $item->id) }}"
                                        method="POST"
                                        class="status-form"
                                    >

                                        @csrf

                                        @method('PUT')


                                        <select
                                            name="status"
                                            onchange="this.form.submit()"
                                            aria-label="Ubah status aspirasi {{ $item->judul }}"
                                        >

                                            <option
                                                value="Menunggu"
                                                {{ $item->status == 'Menunggu' ? 'selected' : '' }}
                                            >
                                                Menunggu
                                            </option>

                                            <option
                                                value="Diproses"
                                                {{ $item->status == 'Diproses' ? 'selected' : '' }}
                                            >
                                                Diproses
                                            </option>

                                            <option
                                                value="Selesai"
                                                {{ $item->status == 'Selesai' ? 'selected' : '' }}
                                            >
                                                Selesai
                                            </option>

                                        </select>

                                    </form>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    style="text-align:center; padding:35px;"
                                >
                                    Belum ada data aspirasi.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <section class="content-card" id="announcements">
            <div class="card-header">
                <div>
                    <h2>Pengumuman Tindak Lanjut</h2>
                    <p>Pengumuman yang diterbitkan akan terlihat oleh publik.</p>
                </div>
            </div>

            @if($errors->any())
                <div class="error-message" role="alert">{{ $errors->first() }}</div>
            @endif

            <p class="announcement-warning">
                Jangan mencantumkan nama, NIM, kontak, isi laporan, bukti, atau informasi pribadi lainnya.
                Gunakan hanya pembaruan umum yang aman untuk dipublikasikan.
            </p>

            <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="announcement-form">
                @csrf
                <div>
                    <label for="announcement-title">Judul pengumuman</label>
                    <input
                        id="announcement-title"
                        name="title"
                        type="text"
                        maxlength="120"
                        value="{{ old('title') }}"
                        required
                    >
                </div>
                <div>
                    <label for="announcement-body">Pembaruan tindak lanjut</label>
                    <textarea
                        id="announcement-body"
                        name="body"
                        maxlength="2000"
                        required
                    >{{ old('body') }}</textarea>
                </div>
                <div>
                    <button type="submit" class="save-button">Publikasikan pengumuman</button>
                </div>
            </form>

            <div class="announcement-admin-list">
                @forelse($announcements as $announcement)
                    <article class="announcement-admin-item">
                        <div>
                            <h3>{{ $announcement->title }}</h3>
                            <p>{{ $announcement->body }}</p>
                            <time>{{ $announcement->published_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB</time>
                        </div>
                        <form
                            class="announcement-delete"
                            action="{{ route('admin.pengumuman.destroy', $announcement->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="save-button">Hapus</button>
                        </form>
                    </article>
                @empty
                    <p class="student-nim">Belum ada pengumuman yang dipublikasikan.</p>
                @endforelse
            </div>
        </section>

        <section class="content-card" id="lombas">
            <div class="card-header">
                <div>
                    <h2>Kelola Pendaftaran Lomba</h2>
                    <p>Informasi aktif akan tampil pada halaman Pendaftaran Lomba.</p>
                </div>
            </div>

            @if($errors->any())
                <div class="error-message" role="alert">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('admin.lomba.store') }}" method="POST" class="competition-form">
                @csrf
                <div>
                    <label for="competition-title">Nama lomba</label>
                    <input
                        id="competition-title"
                        name="title"
                        type="text"
                        maxlength="120"
                        value="{{ old('title') }}"
                        required
                    >
                </div>
                <div>
                    <label for="competition-organizer">Penyelenggara</label>
                    <input
                        id="competition-organizer"
                        name="organizer"
                        type="text"
                        maxlength="120"
                        value="{{ old('organizer') }}"
                        required
                    >
                </div>
                <div>
                    <label for="competition-start">Mulai pendaftaran</label>
                    <input
                        id="competition-start"
                        name="registration_start"
                        type="date"
                        value="{{ old('registration_start') }}"
                        required
                    >
                </div>
                <div>
                    <label for="competition-end">Batas pendaftaran</label>
                    <input
                        id="competition-end"
                        name="registration_end"
                        type="date"
                        value="{{ old('registration_end') }}"
                        required
                    >
                </div>
                <div class="full-width">
                    <label for="competition-description">Deskripsi lomba</label>
                    <textarea
                        id="competition-description"
                        name="description"
                        maxlength="2000"
                        required
                    >{{ old('description') }}</textarea>
                </div>
                <div class="full-width">
                    <label for="competition-url">Tautan pendaftaran (opsional)</label>
                    <input
                        id="competition-url"
                        name="registration_url"
                        type="url"
                        maxlength="2048"
                        value="{{ old('registration_url') }}"
                        placeholder="https://"
                    >
                </div>
                <div class="full-width competition-active">
                    <input
                        id="competition-active"
                        name="is_active"
                        type="checkbox"
                        value="1"
                        @checked(old('is_active', '1') === '1')
                    >
                    <label for="competition-active" style="margin:0">Tampilkan lomba di halaman publik</label>
                </div>
                <div class="full-width">
                    <button type="submit" class="save-button">Tambahkan lomba</button>
                </div>
            </form>

            <div class="competition-admin-list">
                @forelse($lombas as $lomba)
                    <article class="competition-admin-item">
                        <div>
                            <h3>{{ $lomba->title }}</h3>
                            <p><strong>Penyelenggara:</strong> {{ $lomba->organizer }}</p>
                            <p>{{ $lomba->description }}</p>
                            <time>
                                Pendaftaran: {{ $lomba->registration_start->format('d/m/Y') }}
                                – {{ $lomba->registration_end->format('d/m/Y') }}
                            </time>
                            <span class="competition-active-status {{ $lomba->is_active ? '' : 'inactive' }}">
                                {{ $lomba->is_active ? 'Ditampilkan' : 'Disembunyikan' }}
                            </span>
                            @if($lomba->registration_url)
                                <a href="{{ $lomba->registration_url }}" target="_blank" rel="noopener noreferrer">
                                    Buka tautan pendaftaran
                                </a>
                            @endif
                        </div>
                        <form
                            class="announcement-delete"
                            action="{{ route('admin.lomba.destroy', $lomba->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="save-button">Hapus</button>
                        </form>
                    </article>
                @empty
                    <p class="student-nim">Belum ada informasi lomba. Gunakan formulir di atas untuk menambahkannya.</p>
                @endforelse
            </div>
        </section>

        <!-- FOOTER -->

        <div class="footer">

            © {{ date('Y') }}

            Sistem Pengaduan & Aspirasi Mahasiswa —

            Universitas Sriwijaya

        </div>


    </main>

</body>

</html>