<?php

echo '/sources/php/php-mysql/index.php<br>';

try {
  $dbhost = 'mysqlhost';
  $dbuser = 'root';
  $dbpass = 'password';
  $dbname = 'test_db';

  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if ($mysqli->connect_errno) {
    printf('Connect: Failed - %s', $mysqli->connect_error);
    exit();

  } else {
    echo 'Connect: OK';
    echo '<br>';

    if ($mysqli->ping()) {
      echo 'Ping: OK';

    } else {
      printf('Ping: Failed - %s', $mysqli->error);
    }

    $mysqli->close();
  }
  
} catch (Exception $e) {
  printf('Caught exception: %s', $e->getMessage());
  echo '<br>';
}

phpinfo();
