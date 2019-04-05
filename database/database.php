<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 28/03/2019
 * Time: 10:30
 */

require_once __DIR__.'/conf.php';

class DatabaseManager{

    private $pdo;
    private static $manager;

    private function __construct()
    {
        $conn='mysql:host'.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
        $this->pdo =new PDO($conn, DB_USER, DB_PWD);
    }

    public static function getManager(): DatabaseManager{
        if(!isset(self::$manager)){
            self::$manager = new DatabaseManager();
        }
        return self::$manager;
    }

    private function internalExec(string $sql, array $params =[]){
        $stmt = $this->pdo->prepare($sql);
        if ($stmt !== false){
            $success=$stmt->execute($params);
            if ($success !== false){
                return $stmt;
            }
            if(DB_LOG){
                print_r($stmt->errorInfo());
            }
        }
        return NULL;
    }

    public function exec(string $sql, array $params= []):int{
        $stmt = $this->internalExec($sql, $params);
        if($stmt !== NULL){
            return $stmt->rowCount();
        }
        return 0;
    }

    public function getAll(string $sql, array $params =[]): array{
        $stmt = $this->internalExec($sql, $params);
        if($stmt !== NULL){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function findOne(string $sql, array $param=[]): array{
        $stmt =$this->internalExec($sql, $param);
        if($stmt!== null){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }

}