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
  $envPath = FCPATH . '.env';
  echo "Path to .env: " . $envPath; // Tambahkan ini untuk memastikan path benar
  $dotenv = \Dotenv\Dotenv::createImmutable(FCPATH);
  try {
      $dotenv->load();
      // Debugging: tampilkan variabel lingkungan yang dimuat
      echo '<pre>';
      print_r($_ENV);
      echo '</pre>';
  } catch (Exception $e) {
      echo "Error loading .env file: " . $e->getMessage();
  }
};
