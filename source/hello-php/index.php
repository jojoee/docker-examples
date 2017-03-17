<?php

// Wordpress code style

require_once __DIR__ . '/vendor/autoload.php';

use Medoo\Medoo;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Pheanstalk\Pheanstalk;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$config = [
  'mysql' => [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => null,
    'name' => 'jojoee_test',
  ],
  'mongo' => [
    'host' => 'localhost',
    'port' => 27017,
    'name' => 'jojoee_test',
  ],
  'redis' => [
    'host' => 'localhost',
    'port' => 6379,
  ],
  'beanstalkd' => [
    'host' => 'localhost',
    'port' => 11300,
  ],
  'rabbitmq' => [
    'host' => 'localhost',
    'port' => 5672,
  ]
];

$docker_config = [
  'mysql' => [
    'host' => 'db_mysql',
    'user' => 'root',
    'pass' => 'rootpass',
    'name' => 'jojoee_test',
  ]
];

$server_env = getenv( 'SERVER_ENV' );
$is_docker = ( $server_env === 'docker' );
if ( $is_docker ) $config = array_merge( $config, $docker_config );

$error = [
  'mongo' => null,
  'redis' => null,
  'beanstalkd' => null,
  'rabbitmq' => null,

  // custom
  'medoo' => null,
  'pdo' => null,
  'mysqli' => null,
];
$connection = $error;

// MySQL (Medoo)
try {
  $medoo = new Medoo( [
    'database_type' => 'mysql',
    'database_name' => $config['mysql']['name'],
    'server' => $config['mysql']['host'],
    'username' => $config['mysql']['user'],
    'password' => $config['mysql']['pass'],
    'charset' => 'utf8'
  ] );
} catch ( \Exception $e ) {
  $error['medoo'] = $e;
}

// MySQL (PDO)
try {
  $pdo_link = sprintf( 'mysql:host=%s;dbname=%s',
    $config['mysql']['host'],
    $config['mysql']['name']
  );
  $pdo_host = new PDO(
    $pdo_link,
    $config['mysql']['user'],
    $config['mysql']['pass']
  );
} catch ( \Exception $e ) {
  $error['pdo'] = $e;
}

// MySQL (mysqli)
// http://stackoverflow.com/questions/16319306/how-to-check-whether-mysqli-connection-is-open-before-closing-it
if ( class_exists( 'mysqli' ) ) {
  try {
    $mysqli = new mysqli(
      $config['mysql']['host'],
      $config['mysql']['user'],
      $config['mysql']['pass'],
      $config['mysql']['name']
    );

    if ( $mysqli->connect_errno ) $error['mysqli'] = $mysqli->connect_error;
    if ( ! $mysqli->ping() ) $error['mysqli'] = $mysqli->error;
    $mysqli->close();
  } catch ( \Exception $e ) {
    $error['mysqli'] = $e;
  }
} else {
  $error['mysqli'] = 'Class not found';
}

// MongoDB
// https://docs.mongodb.com/php-library/master/
// https://github.com/mongodb/mongo-php-library
// http://php.net/manual/en/mongodb.tutorial.library.php
// https://docs.mongodb.com/php-library/master/reference/method/MongoDBClient-listDatabases/
$mongo_url = sprintf( 'mongodb://%s:%d',
  $config['mongo']['host'],
  $config['mongo']['port']
);
if ( class_exists( 'MongoDB\Driver\Manager' ) ) {
  try {
    $mongo = new MongoDB\Client( $mongo_url );
    $dbs = $mongo->listDatabases();
  } catch ( \Exception $e ) {
    $error['mongo'] = $e;
  }
} else {
  $error['mongo'] = 'Class not found';
}

// Redis
$redis_url = sprintf( 'tcp://%s:%d',
  $config['redis']['host'],
  $config['redis']['port']
);
$redis = new Predis\Client( $redis_url );
try {
  $redis->ping();
} catch ( \Exception $e ) {
  $error['redis'] = $e;
}

// beanstalkd
$pheanstalk = new Pheanstalk(
  $config['beanstalkd']['host'],
  $config['beanstalkd']['port']
);
if ( ! $pheanstalk->getConnection()->isServiceListening() ) {
  $error['beanstalkd'] = 'Failed';
}

// RabbitMQ
// https://www.rabbitmq.com/tutorials/tutorial-one-php.html
try {
  $rabbitmq = new AMQPStreamConnection(
    $config['rabbitmq']['host'],
    $config['rabbitmq']['port'],
    'guest',
    'guest'
  );
  $channel = $rabbitmq->channel();
  $channel->queue_declare( 'hello', false, false, false, false );
  $msg = new AMQPMessage( 'Hello World!' );
  $channel->basic_publish( $msg, '', 'hello' );
  $channel->close();
  $rabbitmq->close();
} catch ( \Exception $e ) {
  $error['rabbitmq'] = $e;
}

// result
foreach ( $error as $key => $value ) {
  $connection[ $key ] = ! $value;
}

function da( $obj ) {
  echo '<pre>';
  print_r( $obj );
  echo '</pre>';
}

da( [
  'config' => $config,
  'connection' => $connection,
  'error' => $error,
] );

print_r( getcwd() );

phpinfo();
