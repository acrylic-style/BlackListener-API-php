<?php
require_once('bug.php');
require_once(__DIR__.'/../vendor/autoload.php');

function generateReport($e) {
  return json_encode([
    "error" => "Internal 404 Not Found or Error",
    "message" => $e->getMessage(),
//    "stacktrace" => preg_replace('{'.preg_quote("/mnt/old/var/www/api_bl/v1_native"). '}', "[v1]", $e->getTraceAsString())
  ]);
}

// Functions
require_once('functions.php');
require_once('functions/mb_str_replace.php');

// Main Bot
  // Users
  require_once('routes/users.php');

  // Servers
  require_once('routes/servers.php');

  // Meta
  require_once('routes/meta.php');

// Patron Bot
  // Users
  require_once('routes/patron/users.php');

  // Servers
  require_once('routes/patron/servers.php');
