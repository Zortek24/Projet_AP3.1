<?php
include ("./modele/modele.hello.php");

class controleur_EditionSuppression
{

    public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
	
	public $m; // objet modele
	
	public $post; // renseigné par index


    public function __construct()
    {
        // déclarer la vue
        $this->vue = "EditionSuppr";
        $this->modele = new Modele_hello();
    }

    public function todo_initialiser()
    {
        $this->data["unCongressiste"] = $this->modele->getListeNom();
        $this->data["listeHotel"] = $this->modele->getHotel();
		$this->data["listeORG"] = $this->modele->getOrg();
    }

    public function todo_modifier(){
        $this->modele->modifiercongressiste($this->post["num"],$this->post["organisme"],$this->post["hotel"],$this->post["nom"], $this->post["prenom"], $this->post["adresse"], $this->post["tel"],$this->post["Accompagner"]);
        $this->data["unCongressiste"] = $this->modele->getListeNom();
        $this->data["listeHotel"] = $this->modele->getHotel();
		$this->data["listeORG"] = $this->modele->getOrg();
    }
    

    public function todo_supprimer(){
        $this->modele->supprimercongressiste($this->post["num"]);
        $this->data["unCongressiste"] = $this->modele->getListeNom();
        $this->data["listeHotel"] = $this->modele->getHotel();
		$this->data["listeORG"] = $this->modele->getOrg();
      
        
    }




}
