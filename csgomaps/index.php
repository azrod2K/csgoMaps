<?php
session_start();
if (!isset($_SESSION['userConnected'])) {
    $_SESSION['userConnected'] = [
        "username" => "",
        "online" => false,
        "idUser" => null,
        "isAdmin" => null
    ];

    $_SESSION['alertMessage'] = [
        "type" => null,
        "message" => null
    ];
}



include "models/MonPdo.php";
include 'models/user.php';
include 'models/maps.php';


include "vues/header.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];
switch ($uc) {
    case 'accueil':
      include 'controllers/map_controller.php';
        break;
    case 'login':
        include 'controllers/login_controller.php';
        break;

    case 'maps':
        echo "map";
        break;
}
include "vues/footer.php";
?>