<?php
  require 'config.php';
  class Connect{  
    // Tratamento de erro para evitar que a senha do usuário seja exibida na tela
    
    private $host = DATA['HOST'];
    private $db = DATA['DB'];
    private $user = DATA['USER'];
    private $passwd = DATA['PASSWD'];
    private $pdo;

    public function __construct() {
      $this->pdo = $this->dbConnect();
    }

    private function dbConnect(){
      try{
        $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      }catch(Exception $e){
        echo 'Erro de conexão: '.$e->getMessage();
      }
    }

    public function getConnection(){
      return $this->pdo;
    }

  }
?>