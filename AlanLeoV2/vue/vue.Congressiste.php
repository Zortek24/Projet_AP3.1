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
      <td>
    <SELECT name="hotel">
        <?php foreach ($c->data["listeHotel"] as $hotel) { ?>
            <option value="<?php echo $hotel->NUM_HOTEL ?>"><?php echo $hotel->NOM_HOTEL ?></option>
        <?php } ?>
    </SELECT>
</td>
<td>
    <SELECT name="organisme">
        <?php foreach ($c->data["listeORG"] as $Org) { ?>
            <option value="<?php echo $Org->NUM_ORGANISME ?>"><?php echo $Org->NOM_ORGANISME ?></option>
        <?php } ?>
    </SELECT>
</td>
        <td>Accompagner ?:</td>
        <SELECT name="Accompagner">
          <option value="1">oui</option>
          <option value="0">non</option>

        </SELECT>

      </td>
      <div class="container">
        <input type="submit" class="initbtn" name="todo" value="initialiser" />
        <input type="submit" class="btn" name="todo" value="enregistrer" />

        



</form>
