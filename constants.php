<?php

date_default_timezone_set("Asia/Kolkata");

$root  = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

defined('BASE_URL') or define('BASE_URL', $root);
defined('ENVIRONMENT') or define('ENVIRONMENT', "development"); //development/ production

defined('BRAND_NAME') or define('BRAND_NAME', "BRAND NAME");
defined('FACEBOOK_LINK') or define('FACEBOOK_LINK', "BRAND NAME");
defined('INSTAGRAM_LINK') or define('INSTAGRAM_LINK', "BRAND NAME");
defined('WHATSAPP_LINK') or define('WHATSAPP_LINK', "BRAND NAME");


/* EMAIL CONFIG */
defined('FROM_EMAIL') or define('FROM_EMAIL', 'info@astrologydivine.com');
defined('SMTP_HOST') or define('SMTP_HOST', 'smtp.hostinger.com');
defined('SMTP_USERNAME') or define('SMTP_USERNAME', 'info@astrologydivine.com');
defined('SMTP_PASSWORD') or define('SMTP_PASSWORD', 'DdwvVlZChMLeSkm4%');
defined('SMTP_PORT') or define('SMTP_PORT', 465);


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
