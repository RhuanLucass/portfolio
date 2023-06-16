<?php
  class Requires{
    private $pdo;
    private $conn;
    private $sql;
    private $competences;
    private $links;
    private $projects;

    public function __construct(){
      $this->pdo = $this->connection();
      $this->requireCompetences();
      $this->requireLinks();
      $this->requireProjects();
    }

    private function connection(){
      $this->conn = new Connect();
      $this->pdo = $this->conn->getConnection();
      return $this->pdo;
    }
    
    private function requireCompetences(){
      $this->sql = $this->pdo->prepare("SELECT * FROM competences");
      $this->sql->execute();
      $this->competences = $this->sql->fetchAll(PDO::FETCH_ASSOC);
      return $this->competences;
    }
    
    private function requireLinks(){
      $this->sql = $this->pdo->prepare("SELECT * FROM links");
      $this->sql->execute();
      $this->links = $this->sql->fetchAll(PDO::FETCH_ASSOC);
      return $this->links;
    }
    
    private function requireProjects(){
      $this->sql = $this->pdo->prepare("SELECT * FROM projects");
      $this->sql->execute();
      $this->projects = $this->sql->fetchAll(PDO::FETCH_ASSOC);
      return $this->projects;
    }


    public function getCompetences(){
      return $this->competences;
    }

    public function getLinks($link){
      foreach ($this->links as $key => $value) {
        if(strtolower($this->links[$key]['nome_link']) === strtolower($link)) 
        return $value;
      }
    }

    public function getProjects(){
      return $this->projects;
    }
  }
?>