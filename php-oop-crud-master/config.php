<?php

return [
  'db' => [
    'host' => 'localhost:3306',
    'user' => 'root',
    'pass' => '',
    'name' => 'php_crud',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
?>