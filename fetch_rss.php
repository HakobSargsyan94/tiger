<?php
require 'config.php';
$url = 'https://ria.ru/export/rss2/archive/index.xml';
$xml = simplexml_load_file($url);

foreach ($xml->channel->item as $item) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO news (title, description, link, pub_date, category, guid) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        (string) $item->title,
        (string) $item->description,
        (string) $item->link,
        date('Y-m-d H:i:s', strtotime($item->pubDate)),
        (string) $item->category,
        (string) $item->guid
    ]);
}