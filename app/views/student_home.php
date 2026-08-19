<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image:
                linear-gradient(rgba(7, 88, 66, 0.64), rgba(7, 88, 66, 0.64)),
                url('<?= base_url('assets/images/student_banner.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            background: #ffffff;
            width: 100%;
            max-width: 640px;
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.45);
            overflow: hidden;
        }
        .card-header {
            background: #195202;
            color: #fff;
            padding: 28px 32px;
        }
        .card-header h1 { font-size: 26px; margin-bottom: 6px; }
        .card-header p { opacity: 0.85; font-size: 14px; }
        .card-body { padding: 28px 32px; }
        .badge {
            display: inline-block;
            background: #fbf1d9;
            color: #8a6d1a;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 999px;
            margin-bottom: 18px;
        }
        .message {
            background: #fff4e5;
            border-left: 4px solid #e08c2b;
            color: #7a4b06;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 20px;
            margin-bottom: 22px;
        }
        .info-grid div span.label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #7a8794;
            margin-bottom: 2px;
        }
        .info-grid div span.value {
            font-size: 15px;
            color: #1b2733;
            font-weight: 600;
        }
        nav {
            display: flex;
            gap: 14px;
            border-top: 1px solid #eef1f4;
            padding-top: 20px;
        }
        nav a {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }
        nav a.primary { background: #195202; color: #fff; }
        nav a.secondary { background: #eef1f4; color: #195202; }
        nav a:hover { opacity: 0.85; }
        .welcome-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #fbf1d9;
            color: #8a6d1a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            margin: 0 auto 18px;
        }
        .welcome-text {
            text-align: center;
            margin-bottom: 26px;
        }
        .welcome-text h2 {
            font-size: 20px;
            color: #1b2733;
            margin-bottom: 8px;
        }
        .welcome-text p {
            font-size: 14px;
            color: #6b7885;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>Student Portal</h1>
            <p>Mindoro State University - Calapan City Campus</p>
        </div>
        <div class="card-body">
            <span class="badge">&#10003; Checked in &mdash; profile page unlocked</span>

            <?php if (!empty($message)): ?>
                <div class="message"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <div class="welcome-icon"><?= strtoupper(substr($student['name'], 0, 1)) ?></div>
            <div class="welcome-text">
                <h2>Welcome, <?= htmlspecialchars($student['name']) ?>! &#128075;</h2>
                <p>
                    This is your student home page. Your student details (ID, course,
                    section, email, and more) are kept on your private profile page &mdash;
                    open it below whenever you're ready to view them.
                </p>
            </div>

            <nav>
                <a class="secondary" href="<?= site_url('student/profile') ?>">View My Profile</a>
                <a class="danger" href="<?= site_url('student/logout') ?>">Log in (test middleware)</a>
            </nav>
        </div>
    </div>
</body>
</html>