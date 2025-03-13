<?php
$host = 'MariaDB-11.2'; // Это написано так для OSPanel
$db   = 'news_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$memcachedHost = '127.127.126.13';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$memcached = new Memcached();
$memcached->addServer($memcachedHost, 11211);