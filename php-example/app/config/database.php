<?
return [
  'db' => [
    'host' =>  $_ENV['HOST'],
    'user' =>  $_ENV['USER'],
    'pass' =>  $_ENV['PASSWORD'],
    'name' =>  $_ENV['DATABASE'],
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
?>