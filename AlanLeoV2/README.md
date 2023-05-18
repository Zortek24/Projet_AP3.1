# AP-3.1-anabase-Alan-Leo

T1.1 gestion des congressistes:

Cette tache a pour but de permettre la creation, modification et suppression d’un congressiste.

Nous avons realiser des formulaires pour chacun des cas traites.

controleur.congressiste.php

Permet la creation du congressiste

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
        if($this->post["Accompagner"] = "oui"){
            $accompagner = 1;
        }
        else{
            $accompagner = 0;
        }
         $this->modele->insererNom($this->post["organisme"],$this->post["hotel"],$this->post["nom"], $this->post["prenom"], $this->post["adresse"], $this->post["Tel"],date('d-m-y'),$accompagner);
    }

}
    
?>

vue.Congressiste.php

permet de faire affiché sur la page d’inscription des congressiste sur un navigateur web

<?php
include "./vue/entete.html.php";
?>
<h2>Formulaire inscription Congressiste </h2>
<div class="form">
  <form class="form_content" action="./?controleur=congressiste" method="POST">

    <div class="container">
      <input type="text" name="nom" placeholder="Saisir un nom" /><br />
      <input type="text" name="prenom" placeholder="Saisir un prenom" /><br />
      <input type="text" name="adresse" placeholder="Saisir une adresse" /><br />
      <input type="text" name="Tel" placeholder="Saisir un numéro de téléphone" /><br />
      <td> Hotel: </td>
      <td><SELECT name="hotel">
          <?php

          foreach ($c->data["listeHotel"] as $hotel) { ?>
            <option value="1"><?php echo $hotel->NOM_HOTEL ?></option><?php
                                                                    }
                                                                      ?>
        </SELECT>

      </td>
      <td> Organisme: </td>
      <td><SELECT name="organisme">
          <?php foreach ($c->data["listeORG"] as $org) { ?>
            <option value="1"><?php echo $org->NOM_ORGANISME ?></option><?php
                                                                      }
                                                                        ?>
        </SELECT>
        <td>Accompagner ?:</td>
        <SELECT name="Accompagner">
          <option value="1">oui</option>
          <option value="2">non</option>

        </SELECT>

      </td>
      <div class="container">
        <input type="submit" class="initbtn" name="todo" value="initialiser" />
        <input type="submit" class="btn" name="todo" value="enregistrer" />

</form>


Resultat sur navigateur web :



controleur.EditionSuppression.php

permet l’édition et la suppression d’un congressiste

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



vue.Edition.Suppr.php

permet l’affichage sur un navigateur de l’édition et suppression

<?php
include "./vue/entete.html.php";
?>

<h2>Formulaire Edition Suppression Congressiste</h2>
<div class="form">
    <form class="form_content" action="./?controleur=EditionSuppression" method="POST">

        <div class="container">

            <?php foreach ($c->data["unCongressiste"] as $uncongre) { ?>

                <table class="edit">
                    <thead>
                        <tr>
                            <th> NUM_CONGRESSISTE </th> <th>NOM_CONGRESSISTE</th><th>PRENOM_CONGRESSISTE</th><th>ADRESSE_CONGRESSISTE</th><th>TEL_CONGRESSISTE</th><th>NOM_HOTEL</th><th>NOM_ORGANISME</th><th>ACCOMPAGNER?</th><th>MODIFIER</th><th>SUPPRIMER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="num" value="<?php echo $uncongre->NUM_CONGRESSISTE ?>" /> </td>
                            <td><input type="text" name="nom" value="<?php echo $uncongre->NOM_CONGRESSISTE ?>" /> </td>
                            <td><input type="text" name="prenom" value="<?php echo $uncongre->PRENOM_CONGRESSISTE ?>" /></td>
                            <td><input type="text" name="adresse" value="<?php echo $uncongre->ADRESSE_CONGRESSISTE ?>" /></td>
                            <td><input type="text" name="tel" value="<?php echo $uncongre->TEL_CONGRESSISTE ?>" /></td>

                            <td><SELECT name="hotel">
                                    <?php

                                    foreach ($c->data["listeHotel"] as $hotel) { ?>
                                        <option value="1"><?php echo $hotel->NOM_HOTEL ?></option><?php
                                                                                                }
                                                                                                    ?>
                                </SELECT>
                            <td><SELECT name="organisme">
                                    <?php foreach ($c->data["listeORG"] as $org) { ?>
                                        <option value="1"><?php echo $org->NOM_ORGANISME ?></option><?php
                                                                                                }
                                                                                                    ?>
                                </SELECT>
                                <td>                                                            
                                <SELECT name="Accompagner">
                                    <option value="1">oui</option>
                                    <option value="2">non</option>
                                </td>    

                                </SELECT>
                            <td><input type="submit" class="btn" name="todo" value="modifier"></td>
                            <td><input type="submit" class="initbtn" name="todo" value="supprimer"></td>
                        </tr>
                    </tbody>
                </table>


            <?php
            } ?>

            </td>


            <?php
            include "./vue/pied.html.php";
            ?>

Résultat sur navigateur web :



T2.5 liste :

Cette tache a pour but de permettre de realiser la liste des congressistes trie par ordre alphabetique.

modele.hello.php

fichier contenant toute les fonctions du code

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
        $req = $this->conn->prepare("select  NUM_ORGANISME from organisme_payeur WHERE NOM_ORGANISME = :nom");
        $req->bindValue('nom',$nom);
        $req->execute();
        
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    
    
}


Plus précisément cette partie qui effectue le trie pour la liste 

public function getListeNom(){
        $req = $this->conn->prepare("select * from congressiste ORDER BY NOM_CONGRESSISTE");
        
        $req->execute();
        
        return $req->fetchAll(PDO::FETCH_OBJ);
    }



