<?php

use Illuminate\Http\Request;

Route::get('/users/{user}', function ($user) {
  try {
    return response(json_encode(json_decode(file_get_contents('http://104.198.24.108/users/'.$user.'/config.json'))), 200)->header('Content-Type', 'application/json');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/owner', function ($user) {
  $owners = [
    "254794124744458241",
    "232902077091807235",
  ];
  try {
    $result = in_array($user, $owners);
    if (is_bool($result)) {
      if ($result) { return 1; } else { return 0; }
    } else {
      return $result;
    }
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/username', function ($user) {
  try {
    return preg_replace("/#.{0,4}/", "", json_decode(file_get_contents('http://104.198.24.108/users/'.$user.'/config.json'))->{'tag'});
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/raw', function ($user) {
  try {
    return file_get_contents('http://104.198.24.108/users/'.$user.'/config.json');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/message', function ($user) {
  try {
    return redirect('/users/'.$user.'/messages');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/messages/{query?}', function ($user, $query = null, Request $request) {
  try {
    $url = 'http://104.198.24.108/users/'.$user.'/messages.log';
    $arr = preg_grep('{'.$query.'}', preg_split('/\n/', mb_str_replace($query, "<span style='background-color: #ffff00;'>".$query."</span>", nl2br( preg_replace('/\[2018\//m', "\n[2018/", htmlspecialchars( @file_get_contents($url) ) /*<-htmlspecialchars*/ ) /*<-preg_replace*/ ) /*<-nl2br*/ ) /*<-mb_str_replace*/ ) /*<-explode*/ ) /*<-preg_grep*/;
    $max = count($arr);
    $m = '';
    foreach ($arr as $key => $a) {
      $head = $request->input('head');
      $tail = $request->input('tail');
      if ($head) {
        if (((int)$head-(int)$key) >= (((int)$key)-(int)$head)) { $m .= $a; }
      } elseif($tail) {
        if (($max-(int)$key) <= (int)$tail) { $m .= $a; }
      } else {
        $m .= $a;
      }
    }
    return $m;
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/editedMessage', function ($user) {
  try {
    return redirect('/users/'.$user.'/editedMessages');
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/editedMessages/{query?}', function ($user, $query = null, Request $request) {
  try {
    $url = 'http://104.198.24.108/users/'.$userr.'/editedMessages.log';
    $arr = preg_grep('{'.$query.'}', preg_split('/\n/', mb_str_replace($query, "<span style='background-color: #ffff00;'>".$query."</span>", nl2br( preg_replace('/\[2018\//m', "\n[2018/", htmlspecialchars( @file_get_contents($url) ) /*<-htmlspecialchars*/ ) /*<-preg_replace*/ ) /*<-nl2br*/ ) /*<-mb_str_replace*/ ) /*<-explode*/ ) /*<-preg_grep*/;
    $max = count($arr);
    $m = '';
    foreach ($arr as $key => $a) {
      $head = $request->input('head');
      $tail = $request->input('tail');
      if ($head) {
        if (((int)$head-(int)$key) >= (((int)$key)-(int)$head)) { $m .= $a; }
      } elseif($tail) {
        if (($max-(int)$key) <= (int)$tail) { $m .= $a; }
      } else {
        $m .= $a;
      }
    }
    return $m;
  } catch(Throwable $e) { return generateReport($e); }
});

Route::get('/users/{user}/{action}', function ($user, $action) {
  try {
    $decoded = json_decode(file_get_contents('http://104.198.24.108/users/'.$user.'/config.json'))->{$action};
    if (is_bool($decoded)) {
      if (is_bool($decoded)) { return 1; } else { return 0; }
    } else {
      return $decoded;
    }
  } catch(Throwable $e) { return generateReport($e); }
});

