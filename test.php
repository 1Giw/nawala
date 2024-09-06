<?php
require "./vendor/autoload.php";
try {
    // Mengambil nilai dari variabel lingkungan menggunakan getenv()
    $baseUrl = getenv('BASE_URL_PRODUCTION');
    $assetsUrl = getenv('ASSETS_URL_PRODUCTION');
    
    // Memeriksa apakah variabel lingkungan berhasil diambil
    if (!$baseUrl || !$assetsUrl) {
        throw new Exception('Environment variables are not set.');
    }
    
    // Gunakan variabel ini di tempat lain dalam aplikasi
    echo "Base URL: " . $baseUrl;
    echo "Assets URL: " . $assetsUrl;

} catch (Exception $e) {
    echo "Cannot load env: " . $e->getMessage();
}