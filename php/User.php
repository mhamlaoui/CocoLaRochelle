<?php 
/**
 * La class va etre instantiée quand on veux affecter les données de quelqu'un, on chargera
 * read-only les données et on les mets dans les champs de la classe, et dans control on affecte la classe
 * 
 * C'est possible que a la fin des transactions qu'on va faire avec l'object personne,
 * on aura de faire des requetes update
 */

class User {
    private $id;
    private $nom;
    private $username;
    private $password;
    private $email;
    private $role; // pour les conducteurs et les passagers, a changer apres 
    private $date_de_naissance;

    public function __construct($id, $nom, $username, $password, $email, $role, $date_de_naissance) {
        $this->id = $id;
        $this->nom = $nom;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->date_de_naissance = $date_de_naissance;
    }

    public function getId() {
        return $this->id;
    }
    

}