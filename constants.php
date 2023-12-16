<?php

date_default_timezone_set("Asia/Kolkata");

$root  = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

defined('BASE_URL') or define('BASE_URL', $root);
defined('ENVIRONMENT') or define('ENVIRONMENT', "development"); //development/ production

if (strtolower(ENVIRONMENT) === "development") {
  error_reporting(-1);
  ini_set('display_errors', 1);
} else {
  ini_set('display_errors', 0);
  if (version_compare(PHP_VERSION, '5.3', '>=')) {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
  } else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
  }
}
