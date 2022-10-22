<?php

require_once __DIR__ . '/vendor/autoload.php';

use Mvc\Controller\EngineCarController;

$entry_point = new EngineCarController;
$entry_point->index();
