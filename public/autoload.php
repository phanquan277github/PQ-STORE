<?php
define('DS', DIRECTORY_SEPARATOR); // dấu phân tách /
define('ROOT_PATH', dirname(__DIR__) . DS);
define('APP', ROOT_PATH . 'app' . DS);
define('CORE', APP . 'core' . DS);
define('CONFIGS', APP . 'configs' . DS);
define('CONTROLLERS', APP . 'controllers' . DS);
define('MODELS', APP . 'models' . DS);
define('VIEWS', APP . 'views' . DS);
define('UPLOADS', ROOT_PATH . 'public' . DS . 'uploads' . DS);

// load config
require_once CONFIGS . 'config.php';
require_once CONFIGS . 'database.php';
require_once CONFIGS . 'routes.php';

// autoload all classes
$modules = [ROOT_PATH, APP, CORE, VIEWS, CONTROLLERS, MODELS, CONFIGS];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload');