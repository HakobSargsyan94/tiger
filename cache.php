<?php
require 'config.php';
function getCachedNews($category, $offset, $limit) {
    global $memcached, $pdo;
    $cacheKey = "news_{$category}_{$offset}_{$limit}";
    $news = $memcached->get($cacheKey);
    var_dump($news);
    if (!$news) {
        $query = "SELECT * FROM news ";
        if ($category !== 'all') {
            $query .= "WHERE category = ? ";
        }
        $query .= "ORDER BY pub_date DESC LIMIT ?, ?";

        $stmt = $pdo->prepare($query);
        if ($category !== 'all') {
            $stmt->execute([$category, $offset, $limit]);
        } else {
            $stmt->execute([$offset, $limit]);
        }
        $news = $stmt->fetchAll();
        $res = $memcached->set($cacheKey, $news, 300);
        var_dump($res);
        $test = $memcached->get($cacheKey);
        var_dump($test);
    }
    return $news;
}