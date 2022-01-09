<?php
$action = filter_input(INPUT_GET, 'action');
if($_SESSION['userConnected']['online'] == false){
    header('Location: index.php?uc=login&action=show');
}
switch ($action) {

        // affichage du formulaire de login
    case 'show':
        Map::ShowAllMaps();
        break;

    case 'selectMap':
        $id = filter_input(INPUT_GET, 'idMap');
        $map = Map::GetMapById($id);
        include 'vues/map.php';
        break;
        // affichage du formulaire de register

    default:
        header('Location: index.php?uc=accueil&action=show');
        break;
}
?>