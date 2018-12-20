<?php

Route::get('/logs/{query?}', function ($query = null) {
  try {
    return mb_str_replace($query, "<span style='background-color: #ffff00;'>".$query."</span>", nl2br(htmlspecialchars(@file_get_contents('http://104.198.24.108/latest.log'))));
  } catch(Throwable $e) { return generateReport($e); }
});
