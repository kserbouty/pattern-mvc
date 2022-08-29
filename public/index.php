<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Archive\Mvc\Controller\EngineCarController;

$entry_point = new EngineCarController;
$entry_point->request($_SERVER['REQUEST_URI']);
