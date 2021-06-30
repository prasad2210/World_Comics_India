<?php 
    $host =  'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'wci';

    // Set DSN
    $dsn = 'mysql:host='. $host .';dbname='. $dbname;

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // Create a PDO instance
    try{
        $pdo = new PDO($dsn, $user, $password, $options);
        $db_app = $pdo;

    }
    catch(\PDOExecption $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
        $pdo = NULL;
    }

?>
