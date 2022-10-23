<?php

namespace App\Utils;

use mysqli;

class SqliConnect
{

  public $dbh;

  private static $_instance;

  private function __construct()
  {
    $configData = parse_ini_file(ROOT. '/App/config.ini'); // path to config.ini

    try {
      $this->dbh = new mysqli(
        $configData['DB_HOST'],
        $configData['DB_USERNAME'],
        $configData['DB_PASSWORD'],
        $configData['DB_NAME']
      );
    } catch (\Exception $exception) {
      echo 'Erreur de connexion...<br>';
      echo $exception->getMessage() . '<br>';
      echo '<pre>';
      echo $exception->getTraceAsString();
      echo '</pre>';
      exit;
    }
  }
    
  public static function getDB()
  {
    if (empty(self::$_instance)) {
      self::$_instance = new SqliConnect();
    }
    return self::$_instance->dbh;
  }

}