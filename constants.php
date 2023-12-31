<?php

date_default_timezone_set("Asia/Kolkata");

$root  = "https://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

defined('BASE_URL') or define('BASE_URL', $root);
defined('ENVIRONMENT') or define('ENVIRONMENT', "development"); //development/ production

defined('BRAND_NAME') or define('BRAND_NAME', "CARGONLINE");
defined('FACEBOOK_LINK') or define('FACEBOOK_LINK', "");
defined('INSTAGRAM_LINK') or define('INSTAGRAM_LINK', "");
defined('WHATSAPP_LINK') or define('WHATSAPP_LINK', "");


/* EMAIL CONFIG */
defined('FROM_EMAIL') or define('FROM_EMAIL', 'info@astrologydivine.com');
defined('SMTP_HOST') or define('SMTP_HOST', 'smtp.hostinger.com');
defined('SMTP_USERNAME') or define('SMTP_USERNAME', 'info@astrologydivine.com');
defined('SMTP_PASSWORD') or define('SMTP_PASSWORD', 'DdwvVlZChMLeSkm4%');
defined('SMTP_PORT') or define('SMTP_PORT', 465);

/* SHEET COLUMNS INDEX */
defined('INDEX_invoice_number') or define('INDEX_invoice_number', 2);
defined('INDEX_invoice_date') or define('INDEX_invoice_date', 3);
defined('INDEX_destination') or define('INDEX_destination', 7);
defined('INDEX_external_link') or define('INDEX_external_link', 10);


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
