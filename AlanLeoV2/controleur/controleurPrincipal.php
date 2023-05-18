<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["congressiste"] = "controleur.congressiste.php";
    $lesActions["default"] = "controleur.menu.php";
    $lesActions["EditionSuppression"] = "controleur.EditionSuppression.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else
    {
        return $lesActions["default"];
    }

}

?>