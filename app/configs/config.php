<?php
define('_DIR_ROOT', __DIR__); // định nghĩa biến lưu đường dẫn gốc là _DIR_ROOT
// xử lí http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
  $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$dirRoot = str_replace('\\', '/', ROOT_PATH);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));
$web_root = $web_root . $folder;
define('_WEB_ROOT', $web_root . 'public');

// định nghĩa FB API
define('_FB_ID', '6801657709923917');
define('_FB_SECRET', 'f19b5c54ccd941df60c07070b830a858');
define('_FB_API_VERSION', 'v2.5');
define('_FB_REDIRECT_URL', 'https://localhost/mvc_php/public/tai-khoan/login_facebook/');

// định nghĩa Google API
define('_GOOGLE_CLIENT_ID', '351487032740-63u40d5648makcda1fbdkvphfm8ick94.apps.googleusercontent.com');
define('_GOOGLE_CLIENT_SECRET', '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');
define('_GOOGLE_REDIRECT_URL', 'https://localhost/mvc_php/public/tai-khoan/login_google/');