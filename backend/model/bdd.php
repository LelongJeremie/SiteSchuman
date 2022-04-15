<?php

class bdd{

private $dbh;
public function __construct()
{
  try {
    $this->dbh = new PDO('mysql:host=localhost:3307;dbname=SiteSchumanp', "root",""); // connexion à la base de donnée

  } catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }

}

public function getBase()
{
  return $this->dbh;
}

}
?>
