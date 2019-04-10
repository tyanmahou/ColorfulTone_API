<?php

require_once './app/loader.php';

$url = $_REQUEST['url'];
$params = explode('/', $url);

$controller = 'ct_api\\' . ucfirst($params[0]) . 'Controller';
$action = $params[1] . 'Action';

$view = new ct_api\ResponseView();
$view->render("{$controller}::{$action}");