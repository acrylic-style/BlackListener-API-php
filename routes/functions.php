<?php

/*
function snowflake2utc($sf)
{
  bcscale(0);
  return bcdiv(bcadd(bcdiv($sf, '4194304'), '1288834974657'), '1000');
}

function fetchUser($userid) {
  $ended = false;
  $discord = new \Discord\Discord([
    'token' => 'NTA3OTI4NDQ0NjUxNDM4MDgx.DshT6Q.pom1WHVZQ03k9N6mfEgvhE7zTHI',
  ]);
  $discord->on('ready', function ($discord) {
    try {
    $user = $discord->factory(Discord\User::class, [ "id" => $id ]);
    require_once('data.php');
    $arr_user = [ $id => [ "bot" => $user->bot, "createdAt" => snowflake2utc($id) ] ];
    $arr = array_merge($data, $arr_user);
    global $arr;
    unlink("data.php");
    $fp = fopen("data.php", "w+");
    fputs($fp, "<?php\n\$data = [\n");
    foreach ($arr as $key => $value) {
      $data = "  \"".$key."\" => \"".$value."\",\n";
      fputs($fp, $data);
    }
    fputs($fp, "];\n");
    fclose($fp);
    } catch(Throwable $e) {
      throw $e;
    }
    $discord->close();
    $ended = true;
  });
  $discord->run();
}
*/

