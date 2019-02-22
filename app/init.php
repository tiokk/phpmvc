<?php
spl_autoload_register(function ($class) {
    include 'core/' . $class . '.php';
});
require_once 'config/config.php';