<?php

// Laravel on Vercel initialization script
$storagePath = '/tmp/storage/framework';
$paths = [
    $storagePath . '/views',
    $storagePath . '/sessions',
    $storagePath . '/cache',
];

foreach ($paths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// Ensure the application bootstraps correctly
require __DIR__ . '/../public/index.php';
