<?php
session_start();
// session_destroy();
require_once "core/App/autoloading.php";


\App\Kernel::run();


?>
