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
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #fff;
            color: #195202;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .card-header h1 { font-size: 22px; margin-bottom: 4px; }
        .card-header p { opacity: 0.85; font-size: 13px; }
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
        table { width: 100%; border-collapse: collapse; margin-bottom: 22px; }
        table tr { border-bottom: 1px solid #eef1f4; }
        table tr:last-child { border-bottom: none; }
        table td { padding: 10px 4px; font-size: 14px; }
        table td.label { color: #7a8794; width: 40%; font-weight: 600; }
        table td.value { color: #1b2733; font-weight: 600; text-align: right; }
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
        nav a.danger { background: #fdeceb; color: #195202; }
        nav a:hover { opacity: 0.85; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="avatar"><?= strtoupper(substr($student['name'], 0, 1)) ?></div>
            <div>
                <h1><?= htmlspecialchars($student['name']) ?></h1>
                <p><?= htmlspecialchars($student['course']) ?> &middot; <?= htmlspecialchars($student['year']) ?></p>
            </div>
        </div>
        <div class="card-body">
            <span class="badge">&#128274; Protected page &mdash; StudentMiddleware verified</span>

            <table>
                <tr><td class="label">Student ID</td><td class="value"><?= htmlspecialchars($student['student_id']) ?></td></tr>
                <tr><td class="label">Name</td><td class="value"><?= htmlspecialchars($student['name']) ?></td></tr>
                <tr><td class="label">Course</td><td class="value"><?= htmlspecialchars($student['course']) ?></td></tr>
                <tr><td class="label">Year Level</td><td class="value"><?= htmlspecialchars($student['year']) ?></td></tr>
                <tr><td class="label">Section</td><td class="value"><?= htmlspecialchars($student['section']) ?></td></tr>
                <tr><td class="label">Email</td><td class="value"><?= htmlspecialchars($student['email']) ?></td></tr>
                <tr><td class="label">Address</td><td class="value"><?= htmlspecialchars($student['address']) ?></td></tr>
                <tr><td class="label">Contact No.</td><td class="value"><?= htmlspecialchars($student['contact']) ?></td></tr>
                <tr><td class="label">Hobbies</td><td class="value"><?= htmlspecialchars($student['hobbies']) ?></td></tr>
            </table>

            <p style="font-size:14px;color:#4a5865;margin-bottom:18px;">
                <?= htmlspecialchars($student['description']) ?>
            </p>

            <nav>
                <a class="primary" href="<?= site_url('student') ?>">Home</a>
            </nav>
        </div>
    </div>
</body>
</html>