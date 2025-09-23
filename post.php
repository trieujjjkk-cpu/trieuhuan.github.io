<?php
$bai = $_GET['bai'] ?? '';
$file = __DIR__ . "/data/$bai/info.json";
if (!file_exists($file)) {
    die("Bài viết không tồn tại!");
}
$data = json_decode(file_get_contents($file), true);
$thumb = "data/$bai/thumb.jpg";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['title']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; }
        header { background: #000; color: #fff; padding: 15px; text-align: center; font-size: 22px; }
        nav { background: #222; padding: 10px; text-align: center; }
        nav a { color: #fff; margin: 0 15px; text-decoration: none; }
        .container { max-width: 800px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; }
        img { width: 100%; border-radius: 8px; }
        h2 { margin-top: 15px; }
        .downloads a { display: inline-block; margin: 10px 5px; padding: 10px 15px; background: #007bff; color: #fff; text-decoration: none; border-radius: 5px; }
        .downloads a:hover { background: #0056b3; }
        footer { background: #000; color: #fff; text-align: center; padding: 15px; margin-top: 30px; }
    </style>
</head>
<body>
<header>MOD SKIN FREE FIRE</header>
<nav>
    <a href="index.php">Trang chủ</a>
    <a href="#">Hướng dẫn</a>
    <a href="#">Tải về</a>
    <a href="#">Liên hệ</a>
</nav>

<div class="container">
    <h2><?= htmlspecialchars($data['title']) ?></h2>
    <img src="<?= $thumb ?>" alt="thumbnail">
    <p><b>Ngày đăng:</b> <?= $data['date'] ?></p>
    <p><?= nl2br(htmlspecialchars($data['description'])) ?></p>

    <h3>Trang bị cần có</h3>
    <ul>
    <?php foreach ($data['features'] as $f) echo "<li>✅ $f</li>"; ?>
    </ul>

    <h3>Phiên bản</h3>
    <ul>
    <?php foreach ($data['versions'] as $v) echo "<li>✅ $v</li>"; ?>
    </ul>

    <div class="downloads">
    <?php foreach ($data['downloads'] as $name => $link) {
        echo "<a href='$link'>Tải về $name</a>";
    } ?>
    </div>
</div>

<footer>© 2025 Ken Mod Z – Mod Skin Free Fire.</footer>
</body>
</html>