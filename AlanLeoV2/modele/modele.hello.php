<?php
Class Modele_hello{
	private $conn;
	
	public function __construct(){
		$login = "root";
		$mdp = "";
		$bd = "bdanabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}
	
	public function getListeNom(){
		$req = $this->conn->prepare("select * from congressiste ORDER BY NOM_CONGRESSISTE");
		
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function insererNom($numOrg,$numHotel,$nom, $prenom, $adresse, $tel,$date,$acc)
	{
		
		$req = $this->conn->prepare("INSERT INTO congressiste(NUM_ORGANISME,NUM_HOTEL,NOM_CONGRESSISTE,PRENOM_CONGRESSISTE,ADRESSE_CONGRESSISTE,TEL_CONGRESSISTE,DATE_INSCRIPTION,CODE_ACCOMPAGNATEUR)VALUES(:numorganisme,:numhotel,:nom,:prenom,:adresse,:tel,:date,:codeacc)");
		$req->bindValue('numorganisme', $numOrg);
		$req->bindValue('numhotel', $numHotel);
		$req->bindValue('nom', $nom);
		$req->bindValue('prenom', $prenom);
		$req->bindValue('adresse', $adresse);
		$req->bindValue('tel', $tel);
		$req->bindValue('date', $date);
		$req->bindValue('codeacc', $acc);


		$req->execute();

	}
	public function modifiercongressiste($numcongre,$numorganisme,$numhotel,$nom,$prenom,$adresse,$tel,$codeacc)
	{
		
		$req = $this->conn->prepare("UPDATE congressiste SET NUM_ORGANISME = ?,NUM_HOTEL = ?,NOM_CONGRESSISTE = ?,PRENOM_CONGRESSISTE = ?,ADRESSE_CONGRESSISTE = ?,TEL_CONGRESSISTE = ?,CODE_ACCOMPAGNATEUR = ? WHERE (NUM_CONGRESSISTE = ?)");
		
		$req->bindValue(1, $numorganisme);
		$req->bindValue(2, $numhotel);
		$req->bindValue(3, $nom);
		$req->bindValue(4, $prenom);
		$req->bindValue(5, $adresse);
		$req->bindValue(6, $tel);
		$req->bindValue(7, $codeacc);
		$req->bindValue(8, $numcongre);
		$req->execute();
	}
	public function supprimercongressiste($numcongre)
	{	
		$req = $this->conn->prepare("DELETE FROM congressiste WHERE NUM_CONGRESSISTE = :numcongre");
		$req->bindValue('numcongre', $numcongre);
		$req->execute();
	}
	public function getHotel()
	{
		$req = $this->conn->prepare("SELECT NUM_HOTEL,NOM_HOTEL FROM hotel");
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);

	}
	public function getOrg()
	{
		$req = $this->conn->prepare("SELECT NUM_ORGANISME,NOM_ORGANISME FROM organisme_payeur");
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);

	}
	public function findOneHotel($nom){
		$req = $this->conn->prepare("select NUM_HOTEL from hotel WHERE NOM_HOTEL = :nom");
		$req->bindValue('nom',$nom);
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	public function findOneOrg($nom){
		$req = $this->conn->prepare("select  NUM_ORGANISME from organisme_payeur WHERE NOM_ORGANISME = :nom");
		$req->bindValue('nom',$nom);
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	
}