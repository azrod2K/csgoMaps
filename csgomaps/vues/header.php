<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>csgo maps</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="./assets/img/logo.jpg" width="30" height="30" alt="">&nbsp;
        <a class="navbar-brand" href="index.php">Csgo Maps</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
            </ul>
            <span class="navbar-text">
                <?php
                if ($_SESSION['userConnected']['online']) {
                ?>
                    <li class="nav-item dropdown" style=" list-style-type: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['userConnected']['username']?> - <?= $_SESSION['userConnected']['isAdmin'] == 1 ? "⭐": "🙍‍♂️"; ?> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="index.php?uc=login&action=deconnecter">Se deconnecter</a>
                        </div>
                    </li>
                <?php
                } else {
                    echo '<a class="btn btn-success" href="index.php?uc=login&action=show">Login</a> <a class="btn btn-success" href="index.php?uc=login&action=showRegister">Register</a>';
                }
                ?>
            </span>
        </div>
    </nav>