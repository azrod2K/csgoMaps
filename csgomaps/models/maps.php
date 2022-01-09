<?php
class Map
{
    private $Id;
    private $Nm_Maps;
    private $Img;
    private $Txt_Description;
    private $Txt_Strategie;


    /**
     * Get id
     */
    public function getId()
    {
        return $this->Id;
    }
    /**
     * Set id
     */
    public function setId_User($Id)
    {
        $this->Id = $Id;
        return $this;
    }
    /**
     * Get Nm_Maps
     */
    public function getNm_Maps()
    {
        return $this->Nm_Maps;
    }
    /**
     * Set Nm_Maps
     */
    public function setNm_Maps($Nm_Maps)
    {
        $this->Nm_Maps = $Nm_Maps;
        return $this;
    }
    /**
     * Get Img
     */
    public function getImg()
    {
        return $this->Img;
    }
    /**
     * Set Img
     */
    public function setImg($Img)
    {
        $this->Img = $Img;
        return $this;
    }
    /**
     * Get Txt_Description
     */
    public function getTxt_Descritpion()
    {
        return $this->Txt_Description;
    }
    /**
     * Set Txt_Description
     */
    public function setTxt_Description($Txt_Description)
    {
        $this->Txt_Description = $Txt_Description;
        return $this;
    }
    /**
     * Get Txt_stragetie
     */
    public function getTxt_stragetie()
    {
        return $this->Txt_stragetie;
    }
    /**
     * Set Txt_stragetie
     */
    public function setTxt_stragetie($Txt_stragetie)
    {
        $this->Txt_stragetie = $Txt_stragetie;
        return $this;
    }

    public static function ShowAllMaps()
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM maps");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Map'); // mettre le nom de la classe
        $req->execute();
        $results = $req->fetchAll();
?>
        <div class="container">
            <div class="row" style="flex-wrap: wrap;  justify-content: center;">
            <?php
            foreach ($results as $map) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/img/<?=$map->getImg() ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5><?= $map->getNm_Maps() ?></h5>
                        <p class="card-text"><?= $map->getTxt_Descritpion() ?></p>
                        <a class="btn btn-primary" href="index.php?uc=accueil&action=selectMap&idMap=<?= $map->getId() ?>">Plus d'infos</a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
<?php
    }


    public static function GetMapById($id){
        $req = MonPdo::getInstance()->prepare("SELECT * FROM maps WHERE Id = :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Map'); // mettre le nom de la classe
        $req->bindParam(":id", $id);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
}

?>