<?php

namespace App\Utils;
use PDO;

class PdoConnect
{
    /** @var PDO */
    private $dbh;
    private static $_instance;

    /**
     * DB constructor.
     */
    private function __construct()
    {
        $configData = parse_ini_file(ROOT. '/App/config.ini'); // path to config.ini

        try {
            $this->dbh = new PDO( 
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
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

    /**
     * @return PDO
     */
    public static function getPDO()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new PdoConnect();
        }
        return self::$_instance->dbh;
    }
}