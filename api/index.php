<?php

// Fix for Laravel on Vercel
// Ensure we can write to /tmp
$storagePath = '/tmp/storage/framework';
foreach (['views', 'sessions', 'cache'] as $path) {
    if (!is_dir($storagePath . '/' . $path)) {
        mkdir($storagePath . '/' . $path, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';
