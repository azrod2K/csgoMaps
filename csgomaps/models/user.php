<?php
class User
{
    // déclaration des variables de la class
    // ----------------------------------

    private $id;
    private $Nm_Nom;
    private $Nm_Prenom;
    private $Txt_Mail;
    private $Password;
    private $isAdmin;

    // Getter / setter
    // ----------------------------------


    /**
     * Get id
     */
    public function getid()
    {
        return $this->id;
    }
    /**
     * Set id
     */
    public function setId_User($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Nom
     */
    public function getNm_Nom()
    {
        return $this->Nm_Nom;
    }
    /**
     * Set Nom
     */
    public function setNm_Nom($Nm_Nom)
    {
        $this->Nm_Nom = $Nm_Nom;
        return $this;
    }

    /**
     * Get Prenom
     */
    public function getNm_Prenom()
    {
        return $this->Nm_Prenom;
    }
    /**
     * Set Prenom
     */
    public function setNm_Prenom($Nm_Prenom)
    {
        $this->Nm_Prenom = $Nm_Prenom;
        return $this;
    }

    /**
     * Get Mail
     */
    public function getTxt_Mail()
    {
        return $this->Txt_Mail;
    }
    /**
     * Set Mail
     */
    public function setTxt_Mail($Txt_Mail)
    {
        $this->Txt_Mail = $Txt_Mail;
        return $this;
    }


    /**
     * Get Password
     */
    public function getPassword()
    {
        return $this->Password;
    }
    /**
     * Set password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }


    /**
     * Get isAdmin
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
    /**
     * Set isadmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin;
        return $this;
    }

    //Fonctions de la class
    // ----------------------------------


    // verrifier les informations de connection
    public static function VerifierConnexion(User $user)
    {
        $email = $user->getTxt_Mail();

        $req = MonPdo::getInstance()->prepare("SELECT * FROM tbl_users WHERE Txt_Mail = :email;");
        $req->bindParam(":email", $email);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User'); // mettre le nom de la classe
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    public static function IsEmailExisting($email)
    {
        $req = MonPdo::getInstance()->prepare("SELECT id, Txt_Mail FROM tbl_users");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User'); // mettre le nom de la classe
        $req->execute();
        $result = $req->fetchAll();

        foreach ($result as $r) {
            if ($r->getTxt_Mail() == $email) {
                return true;
            }
        }
        return false;
    }
    public static function InscrireUser(User $user)
    {
        $nom = $user->getNm_Nom();
        $prenom = $user->getNm_Prenom();
        $email = $user->getTxt_Mail();
        $passwordHash = User::Crypter($user->getPassword());

        $req = MonPdo::getInstance()->prepare("INSERT INTO tbl_users(Nm_Nom, Nm_Prenom, Txt_Mail, Password, isAdmin) VALUES(:nom, :prenom, :mail, :passwordHash, 0);");
        $req->bindParam(":nom", $nom);
        $req->bindParam(":prenom", $prenom);
        $req->bindParam(":mail", $email);
        $req->bindParam(":passwordHash", $passwordHash);
        $req->execute();
    }

    //crypter le mdp
    public static function Crypter($mdpclair)
    {
        return MD5($mdpclair);
    }
}
?>