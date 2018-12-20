<?php
//try{file_get_contents('/extended/root/root/dis/BlackListener/data/users/254794124744458241/config.json');}catch(Throwable $e){http_response_code(500);die('{"error":"Origin is unreachable"}');}

Route::get('/patron/users/{user}', function ($user) {
  try {
    return response(json_encode(json_decode(file_get_contents('/extended/root/root/dis/BlackListener/data/users/'.$user.'/config.json'))), 200)->header('Content-Type', 'application/json');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/patron/users/{user}/username', function ($user) {
  try {
    return preg_replace("/#.{0,4}/m", "", json_decode(file_get_contents('/extended/root/root/dis/BlackListener/data/users/'.$user.'/config.json'))->{'tag'});
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/patron/users/{user}/raw', function ($user) {
  try {
    return file_get_contents('/extended/root/root/dis/BlackListener/data/users/'.$user.'/config.json');
  } catch(Throwable $e) { return generateReport($e); }
});

/*
Route::get('/users/{user}/bot', function ($user) {
  try {
    fetchUser($user);
    $i = 0;
    $interrupted = false;
    for (;;) {
      if ($i <= 5) {
        $interrupted = true;
        break;
      }
      sleep(1);
      $i++;
      continue;
    }
    for (;;) {
      if (interrupted) { break; }
      if (ended) {
        return $arr[$user]['bot'];
        break;
      }
    }
  } catch(Throwable $e) { return generateReport($e); }
});
*/

Route::get('/patron/users/{user}/{action}', function ($user, $action) {
  try {
    $decoded = json_decode(file_get_contents('/extended/root/root/dis/BlackListener/data/users/'.$user.'/config.json'))->{$action};
    if (is_bool($decoded)) {
      if (is_bool($decoded)) { return 1; } else { return 0; }
    } else {
      return $decoded;
    }
  } catch(Throwable $e) { return generateReport($e); }
});

