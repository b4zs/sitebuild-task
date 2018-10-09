<?php

include 'classes.php';
include 'config.php';

$route = !empty($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO']) : 'index';

App::getInstance()->route($route);
