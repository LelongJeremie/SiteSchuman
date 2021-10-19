<?php
class BDD {
 private $bdd;

 public function co_bdd() {
   $this->bdd = new PDO('mysql:host=localhost;dbname=siteschuman;charset=utf8', 'root', '');
   return $this->bdd;
 }
 public function getbdd(){
        return $this->bdd;
      }
      public function setbdd(){
        $POST_[$bdd] = $this->bdd;
             return $this->bdd;
           }
}

?>
