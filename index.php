<?php
$dir = __DIR__ . "/data";
$folders = array_diff(scandir($dir), ['.', '..']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>KEN MOD Z</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; }
        header { background: #000; color: #fff; padding: 15px; text-align: center; font-size: 22px; }
        nav { background: #222; padding: 10px; text-align: center; }
        nav a { color: #fff; margin: 0 15px; text-decoration: none; }
        .container { max-width: 900px; margin: 20px auto; }
        .card { background: #fff; margin-bottom: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .card img { width: 100%; display: block; }
        .card h3 { margin: 10px; }
        .card p { margin: 0 10px 10px; color: #555; }
        footer { background: #000; color: #fff; text-align: center; padding: 15px; margin-top: 30px; }
    </style>
</head>
<body>
<header>KEN MOD Z</header>
<nav>
    <a href="index.php">Trang chủ</a>
    <a href="#">Hướng dẫn</a>
    <a href="#">Youtube</a>
    <a href="#">Mod theo yêu cầu</a>
</nav>

<div class="container">
<?php
foreach ($folders as $folder) {
    $infoFile = "$dir/$folder/info.json";
    $thumbFile = "data/$folder/thumb.jpg";
    if (file_exists($infoFile)) {
        $data = json_decode(file_get_contents($infoFile), true);
        echo "<div class='card'>
                <a href='post.php?bai=$folder'>
                    <img src='$thumbFile' alt='{$data['title']}'>
                </a>
                <h3>{$data['title']}</h3>
                <p>{$data['description']}</p>
              </div>";
    }
}
?>
</div>

<footer>© 2025 Ken Mod Z – Mod Skin Free Fire.</footer>
</body>
</html>