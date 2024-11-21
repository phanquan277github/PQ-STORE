<?php
define('_DIR_ROOT', __DIR__); // Đường dẫn gốc

// Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

// Đường dẫn đến thư mục public
$web_root .= str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME'])); // Lấy đường dẫn từ script đang chạy

// Đảm bảo rằng đường dẫn đến thư mục public
define('_WEB_ROOT', rtrim($web_root, "/"));

// định nghĩa FB API
define('_FB_ID', '6801657709923917');
define('_FB_SECRET', 'f19b5c54ccd941df60c07070b830a858');
define('_FB_API_VERSION', 'v2.5');
define('_FB_REDIRECT_URL', 'https://localhost/mvc_php/public/tai-khoan/login_facebook/');

// định nghĩa Google API
define('_GOOGLE_CLIENT_ID', '351487032740-63u40d5648makcda1fbdkvphfm8ick94.apps.googleusercontent.com');
define('_GOOGLE_CLIENT_SECRET', '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');
define('_GOOGLE_REDIRECT_URL', 'https://localhost/mvc_php/public/tai-khoan/login_google/');
