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

                            <td>  <SELECT name="hotel">
        <?php foreach ($c->data["listeHotel"] as $hotel) { ?>
            <option value="<?php echo $hotel->NUM_HOTEL ?>"><?php echo $hotel->NOM_HOTEL ?></option>
        <?php } ?>
    </SELECT>
                            <td><SELECT name="organisme">
        <?php foreach ($c->data["listeORG"] as $Org) { ?>
            <option value="<?php echo $Org->NUM_ORGANISME ?>"><?php echo $Org->NOM_ORGANISME ?></option>
        <?php } ?>
    </SELECT>
                                <td>                                                            
                                <SELECT name="Accompagner">
                                    <option value="1">oui</option>
                                    <option value="0">non</option>
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