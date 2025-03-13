<?php
require 'cache.php';
$category = $_GET['category'] ?? 'all';
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$news = getCachedNews($category, $offset, $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Новостной агрегатор</title>
</head>
<body>
<h1>Новости</h1>
<ul>
    <?php foreach ($news as $item): ?>
        <li>
            <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
            <p><?= $item['description'] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<div>
    <?php if ($page > 1): ?>
        <a href="?category=<?= $category ?>&page=<?= $page - 1 ?>">Предыдущая</a>
    <?php endif; ?>
    <a href="?category=<?= $category ?>&page=<?= $page + 1 ?>">Следующая</a>
</div>
</body>
</html>
