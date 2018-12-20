<?php


Route::get('/servers/{server}', function ($server) {
  $premiumState = require_once("/extended/root/var/www/api/guilds.php");
  try {
    return json_encode(array_merge((array)json_decode(file_get_contents('http://104.198.24.108/servers/'.$server.'/config.json')), [ "premium" => in_array($server, $premiumState) ]));
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/raw', function ($server) {
  try {
    return file_get_contents('http://104.198.24.108/servers/'.$server.'/config.json');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/message', function ($server) {
  try {
    return redirect('/servers/'.$server.'/messages');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/messages/{query?}', function ($server, $query = null) {
  try {
    return mb_str_replace($query, "<span style='background-color: #ffff00;'>".$query."</span>", nl2br(preg_replace('/\[2018\//m', "\n[2018/", htmlspecialchars(@file_get_contents('http://104.198.24.108/servers/'.$server.'/messages.log')))));
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/editedMessage', function ($server) {
  try {
    return redirect('/servers/'.$server.'/editedMessages');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/editedMessages/{query?}', function ($server, $query = null) {
  try {
    return mb_str_replace($query, "<span style='background-color: #ffff00;'>".$query."</span>", nl2br(preg_replace('/\[2018\//m', "\n[2018/", htmlspecialchars(@file_get_contents('http://104.198.24.108/servers/'.$server.'/editedMessages.log')))));
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/premium', function ($server) {
  $premiumState = require_once("/extended/root/var/www/api/guilds.php");
  try {
    return json_encode([ "premium" => in_array($server, $premiumState) ]);
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/servers/{server}/{action}', function ($server, $action) { // This is must be last
  try {
    return (string)json_decode(file_get_contents('http://104.198.24.108/servers/'.$server.'/config.json'))->{$action};
  } catch(Throwable $e) { return generateReport($e); }
});
