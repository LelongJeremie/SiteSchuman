<?php

require_once 'contact.php';
class utilisateur extends contact{

  public $id,$nom,$salleidmodif,$prenom,$password, $passwordmodifconf,$passwordmodif,$passwordconf,$role,$username,$typemodif,$mail,$mailmodif,$idmodif,$idadminmodif,$nomadminmodif,$prenomadminmodif,$passwordadminmodif,$mailadminmodif,$roleadminmodif,$salleplace,$description,$sallenomfilm,$theme,$troisd,$salleid,$image,$tarif,$cb,$place,$prix;

  // constructeur

  public function __construct(array $donnees)
  {

    $this->hydrate($donnees);
    
  }


  //Fonction Hydrate

  public function hydrate(array $donnes)
  {
    foreach ($donnes as $key => $value){
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method)){
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }




  // LISTE DES GETTERS

  public function getId()
  {
    return $this-> id;
  }
  public function getIdmodif()
  {
    return $this-> idmodif;
  }
  public function getSalleidmodif()
  {
    return $this-> salleidmodif;
  }


  public function getIdadminmodif()
  {
    return $this-> idadminmodif;
  }

  public function getImage()
  {
    return $this-> image;
  }


  public function getNom()
  {
    return $this-> nom;
  }

  public function getNomadminmodif()
  {
    return $this-> nomadminmodif;
  }

  public function getPrenom()
  {
    return $this-> prenom;
  }
  public function getPrix()
  {
    return $this-> prix;
  }
  public function getPrenomadminmodif()
  {
    return $this-> prenomadminmodif;
  }

  public function getPassword()
  {
    return $this-> password;
  }


  public function getPasswordadminmodif()
  {
    return $this-> passwordadminmodif;
  }

  public function getPasswordconf()
  {
    return $this-> passwordconf;
  }
  public function getSalleid()
  {
    return $this-> salleid;
  }

  public function getPasswordmodifconf()
  {
    return $this-> passwordmodifconf;
  }

  public function getPasswordmodif()
  {
    return $this-> passwordmodif;
  }

  public function getUsername()
  {
    return $this-> username;
  }


  public function getUsernameadminmodif()
  {
    return $this-> usernameadminmodif;
  }


  public function getMail()
  {
    return $this-> mail;
  }

  public function getMailadminmodif()
  {
    return $this-> mailadminmodif;
  }

  public function getMailmodif()
  {
    return $this-> mailmodif;
  }

  public function getRole()
  {
    return $this-> role;
  }

  public function getRoleadminmodif()
  {
    return $this-> roleadminmodif;
  }

  public function getTypemodif()
  {
    return $this-> typemodif;
  }

  public function getDescription()
  {
    return $this-> description;
  }


  public function getTroisd()
  {
    return $this-> troisd;
  }




  public function getSallenomfilm()
  {
    return $this-> sallenomfilm;
  }

  public function getSalleplace()
  {
    return $this-> salleplace;
  }


  public function getTheme()
  {
    return $this-> theme;
  }
  public function getTarif()
  {
    return $this-> tarif;
  }

  public function getCb()
  {
    return $this-> cb;
  }

  public function getPlace()
  {
    return $this-> place;
  }


  // LISTE DES SETTERS

  public function setId($id)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $id = (int) $id;

    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($id > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this-> id = $id;
    }
  }

  public function setIdadminmodif($idadminmodif)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $idadminmodif = (int) $idadminmodif;

    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($idadminmodif > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this-> idadminmodif = $idadminmodif;
    }
  }

  public function setIdmodif($idmodif)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $idmodif = (int) $idmodif;

    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($idmodif > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this-> idmodif = $idmodif;
    }
  }
  public function setSalleidmodif($salleidmodif)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $salleidmodif = (int) $salleidmodif;

    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($salleidmodif > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this-> salleidmodif = $salleidmodif;
    }
  }

  public function setNom($nom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($nom))
    {
      $this-> nom = $nom;
    }
  }
  public function setDescription($description)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($description))
    {
      $this-> description = $description;
    }
  }

  public function setPrenom($prenom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($prenom))
    {
      $this-> prenom = $prenom;
    }}


    public function setPassword($password)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($password))
      {
        $this-> password = $password;
      }
    }

    public function setImage($image)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($image))
      {
        $this-> image = $image;
      }
    }
    public function setSalleid($salleid)
    {
      // On convertit l'argument en nombre entier.
      // Si c'en était déjà un, rien ne changera.
      // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
      $salleid = (int) $salleid;

      // On vérifie ensuite si ce nombre est bien strictement positif.
      if ($salleid > 0)
      {
        // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
        $this-> salleid = $salleid;
      }
    }


    public function setPasswordmodif($passwordmodif)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($passwordmodif))
      {
        $this-> passwordmodif = $passwordmodif;
      }
    }

    public function setPasswordmodifconf($passwordmodifconf)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($passwordmodifconf))
      {
        $this-> passwordmodifconf = $passwordmodifconf;
      }
    }




    public function setNomadminmodif($nomadminmodif)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($nomadminmodif))
      {
        $this-> nomadminmodif = $nomadminmodif;
      }
    }

    public function setPrenomadminmodif($prenomadminmodif)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($prenomadminmodif))
      {
        $this-> prenomadminmodif = $prenomadminmodif;
      }}


      public function setPasswordadminmodif($passwordadminmodif)
      {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($passwordadminmodif))
        {
          $this-> passwordadminmodif = $passwordadminmodif;
        }
      }

      public function setUsernameadminmodif($usernameadminmodif)
      {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($usernameadminmodif))
        {
          $this-> usernameadminmodif = $usernameadminmodif;
        }}

        public function setRoleadminmodif($roleadminmodif)
        {
          // On vérifie qu'il s'agit bien d'une chaîne de caractères.
          if (is_string($roleadminmodif))
          {
            $this-> roleadminmodif = $roleadminmodif;
          }}

          public function setMailadminmodif($mailadminmodif)
          {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($mailadminmodif))
            {
              $this-> mailadminmodif = $mailadminmodif;
            }}


            public function setPasswordconf($passwordconf)
            {
              // On vérifie qu'il s'agit bien d'une chaîne de caractères.
              if (is_string($passwordconf))
              {
                $this-> passwordconf = $passwordconf;
              }
            }
            public function setUsername($username)
            {
              // On vérifie qu'il s'agit bien d'une chaîne de caractères.
              if (is_string($username))
              {
                $this-> username = $username;
              }}

              public function setRole($role)
              {
                // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                if (is_string($role))
                {
                  $this-> role = $role;
                }}
                public function setTypemodif($typemodif)
                {
                  // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                  if (is_string($typemodif))
                  {
                    $this-> typemodif = $typemodif;
                  }}

                  public function setMail($mail)
                  {
                    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                    if (is_string($mail))
                    {
                      $this-> mail = $mail;
                    }}

                    public function setMailmodif($mailmodif)
                    {
                      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                      if (is_string($mailmodif))
                      {
                        $this-> mailmodif = $mailmodif;
                      }}

                      public function setSalleplace($salleplace)
                      {
                        // On convertit l'argument en nombre entier.
                        // Si c'en était déjà un, rien ne changera.
                        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                        $salleplace = (int) $salleplace;

                        // On vérifie ensuite si ce nombre est bien strictement positif.
                        if ($salleplace > 0)
                        {
                          // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                          $this-> salleplace = $salleplace;
                        }
                      }


                      public function setTheme($theme)
                      {
                        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                        if (is_string($theme))
                        {
                          $this-> theme = $theme;
                        }}


                        public function setSallenomfilm($sallenomfilm)
                        {
                          // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                          if (is_string($sallenomfilm))
                          {
                            $this-> sallenomfilm = $sallenomfilm;
                          }}

                          public function setTarif($tarif)
                          {
                            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
                            if (is_string($tarif))
                            {
                              $this-> tarif = $tarif;
                            }}

                            public function setTroisd($troisd)
                            {
                              // On convertit l'argument en nombre entier.
                              // Si c'en était déjà un, rien ne changera.
                              // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                              $troisd = (int) $troisd;

                              // On vérifie ensuite si ce nombre est bien strictement positif.
                              if ($troisd > 0)
                              {
                                // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                                $this-> troisd = $troisd;
                              }}


                              public function setPlace($place)
                              {
                                // On convertit l'argument en nombre entier.
                                // Si c'en était déjà un, rien ne changera.
                                // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                                $place = (int) $place;

                                // On vérifie ensuite si ce nombre est bien strictement positif.
                                if ($place > 0)
                                {
                                  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                                  $this-> place = $place;
                                }
                              }


                              public function setPrix($prix)
                              {
                                // On convertit l'argument en nombre entier.
                                // Si c'en était déjà un, rien ne changera.
                                // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                                $prix = (int) $prix;

                                // On vérifie ensuite si ce nombre est bien strictement positif.
                                if ($prix > 0)
                                {
                                  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                                  $this-> prix = $prix;
                                }
                              }

                              public function setCb($cb)
                              {
                                // On convertit l'argument en nombre entier.
                                // Si c'en était déjà un, rien ne changera.
                                // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
                                $cb = (int) $cb;

                                // On vérifie ensuite si ce nombre est bien strictement positif.
                                if ($cb > 0)
                                {
                                  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                                  $this-> cb = $cb;
                                }
                              }

                            }

                            ?>
