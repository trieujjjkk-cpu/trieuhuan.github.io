<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = date("Y-m-d");
    $features = $_POST['features'] ?? [];
    $versions = $_POST['versions'] ?? [];
    $downloads = $_POST['downloads'] ?? [];

    // Tạo tên thư mục từ tiêu đề (viết liền không dấu)
    $folder = preg_replace('/[^A-Za-z0-9]/', '', strtoupper(str_replace(" ", "", $title)));
    $path = __DIR__ . "/data/$folder";
    if (!is_dir($path)) mkdir($path, 0777, true);

    // Lưu ảnh thumbnail
    if (!empty($_FILES['thumb']['tmp_name'])) {
        move_uploaded_file($_FILES['thumb']['tmp_name'], "$path/thumb.jpg");
    }

    // Tạo info.json
    $info = [
        "title" => $title,
        "date" => $date,
        "description" => $desc,
        "features" => $features,
        "versions" => $versions,
        "downloads" => $downloads
    ];
    file_put_contents("$path/info.json", json_encode($info, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "<p style='color:green'>Đăng bài thành công! <a href='index.php'>Xem trang chủ</a></p>";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng bài</title>
</head>
<body>
    <h2>Tạo bài đăng mới</h2>
    <form method="post" enctype="multipart/form-data">
        Tiêu đề: <input type="text" name="title" required><br><br>
        Mô tả: <textarea name="description" required></textarea><br><br>
        Ảnh thumbnail: <input type="file" name="thumb" accept="image/*" required><br><br>

        <h3>Trang bị cần có</h3>
        <input type="text" name="features[]"><br>
        <input type="text" name="features[]"><br>

        <h3>Phiên bản</h3>
        <label><input type="checkbox" name="versions[]" value="FF Thường"> FF Thường</label><br>
        <label><input type="checkbox" name="versions[]" value="FF Max"> FF Max</label><br>
        <label><input type="checkbox" name="versions[]" value="Android"> Android</label><br>
        <label><input type="checkbox" name="versions[]" value="Ios"> Ios</label><br>

        <h3>Link tải</h3>
        FF Thường: <input type="text" name="downloads[FF Thường]"><br>
        FF Max: <input type="text" name="downloads[FF Max]"><br>
        Ios: <input type="text" name="downloads[Ios]"><br>

        <br><button type="submit">Đăng bài</button>
    </form>
</body>
</html>