<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
# Load phpdotenv
$hook['pre_system'] = function() {
  $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
  try {
    $dotenv->load();
  } catch ( Exception $e )  {
    echo $e->getMessage();
  }
};