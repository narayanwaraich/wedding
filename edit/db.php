<?php

class db {
    public $host;
    public $dbname;
    public $user;
    public $pass;
    private $dbh;

    function __construct($h,$d,$u,$p) {
      $this->host = $h;
      $this->dbname = $d;
      $this->user = $u;
      $this->pass = $p;
      $this->connect();
    }

    public function connect()
    {
      try {
        $DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $this->dbh = $DBH;
      }
      catch(PDOException $e) {
          return $e->getMessage();
      }
    }

    public function selectAllObject($table,$class_name)
    {
      $STH = $this->dbh->query("SELECT * from $table");
      $STH->setFetchMode(PDO::FETCH_CLASS, "$class_name");

      return $STH->fetchAll();
    }
}

?>
