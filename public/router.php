<?php
// public/router.php

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Se for arquivo real, deixa o PHP servir normalmente
if (file_exists(__DIR__ . $uri)) {
    return false;
}

// Para rotas da API, redireciona manualmente
if (str_starts_with($uri, '/backend/')) {
    require __DIR__ . '/../' . ltrim($uri, '/');
    exit;
}

// Caso contrário, serve o index
require __DIR__ . '/index.php';
