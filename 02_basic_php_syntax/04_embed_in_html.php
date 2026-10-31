<?php
$title = "PHP を HTML に埋め込む";
$items = ["echo", "print", "print_r", "var_dump"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
    <p>生成日時: <?= date("Y-m-d H:i:s") ?></p>
</body>
</html>
