<?php

Route::get('/patron/servers/{server}', function ($server) {
  try {
    return json_encode(json_decode(file_get_contents('/extended/root/root/dis/BlackListener/data/servers/'.$server.'/config.json')));
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/patron/servers/{server}/raw', function ($server) {
  try {
    return file_get_contents('/extended/root/root/dis/BlackListener/data/servers/'.$server.'/config.json');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/patron/servers/{server}/{action}', function ($server, $action) { // This is must be last
  try {
    return (string)json_decode(file_get_contents('/extended/root/root/dis/BlackListener/data/servers/'.$server.'/config.json'))->{$action};
  } catch(Throwable $e) { return generateReport($e); }
});
