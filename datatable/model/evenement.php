<?php
class Evenement {
  private $id, $titre, $date,$lieu,$createur,$resume,$nb_participant;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getid() {
    return $this->id;
  }

  public function gettitre() {
    return $this->titre;



  }
  public function getdate() {
    return $this->date;



  }
  public function getlieu() {
    return $this->lieu;



  }
  public function getcreateur() {
    return $this->createur;



  }
  public function getresume() {
    return $this->resume;



  }



  public function getnb_participant() {
    return $this->nb_participant;
  }

# Setters

public function setid($id) {
  if (is_string($id)) {
    $this->id = $id;
  }
}

  public function settitre($titre) {
    $this->titre = $titre;
  }


    public function setdate($date) {
      $this->date = $date;
    }
    public function setlieu($lieu) {
      $this->lieu = $lieu;
    }
    public function setcreateur($createur) {
      $this->createur = $createur;
    }
    public function setresume($resume) {
      $this->resume = $resume;
    }


    public function setnb_participant($nb_participant) {
      $this->nb_participant = $nb_participant;
    }








# Hydratation

  public function hydrate(array $res) {
    foreach ($res as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}
