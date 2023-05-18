<?php
include ("./modele/modele.hello.php");

Class Controleur_congressiste{
	// --- champs de base du controleur
	public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
	
	public $m; // objet modele
	
	public $post; // renseigné par index

	public function __construct(){
		// déclarer la vue
		$this->vue = "Congressiste";
		$this->modele = new Modele_hello();	
	}
	public function todo_initialiser(){
		$this->data["listeHotel"] = $this->modele->getHotel();
		$this->data["listeORG"] = $this->modele->getOrg();
	}
	public function todo_enregistrer(){	

		
		 $this->modele->insererNom($this->post["organisme"],$this->post["hotel"],$this->post["nom"], $this->post["prenom"], $this->post["adresse"], $this->post["Tel"],date('d-m-y'),$this->post["Accompagner"]);
	}

}
	
?>