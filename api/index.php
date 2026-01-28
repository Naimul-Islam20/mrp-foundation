<?php

// Show errors for debugging on Vercel
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Laravel on Vercel initialization
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

// Set environment variables for Vercel
$_ENV['APP_CONFIG_CACHE'] = $storagePath . '/config.php';
$_ENV['APP_EVENTS_CACHE'] = $storagePath . '/events.php';
$_ENV['APP_PACKAGES_CACHE'] = $storagePath . '/packages.php';
$_ENV['APP_ROUTES_CACHE'] = $storagePath . '/routes.php';
$_ENV['VIEW_COMPILED_PATH'] = $storagePath . '/views';

require __DIR__ . '/../public/index.php';
