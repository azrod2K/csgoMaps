<?php
$action = filter_input(INPUT_GET, 'action');
switch ($action) {

    // affichage du formulaire de login
    case 'show':
        include 'vues/login.php';
        break;

        // affichage du formulaire de register
    case 'showRegister':
        include 'vues/register.php';
        break;

        // connexion de l'utilisateur
    case 'validateLogin':
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($mail != "" && $password != "") {
            // si les champs sont remplis
            $user = new user();
            $user->setTxt_Mail($mail)
            ->setPassword($password);

            $reqResult = User::VerifierConnexion($user);
            if($reqResult != false){
                if($reqResult->getTxt_Mail() == $mail && $reqResult->getPassword() == User::Crypter($password)){
                    $_SESSION['userConnected'] = [
                        "username" => $reqResult->getTxt_Mail(),
                        "online" => true,
                        "idUser" => $reqResult->getId(),
                        "isAdmin" => $reqResult->getIsAdmin()
                    ];
                    header('Location: index.php');
                }else{
                    $_SESSION['alertMessage'] = [
                        "type" => "danger",
                        "message" => "Email ou mot de passe incorrect"
                    ];
                    header("Location: index.php?uc=login&action=show");
                }
            }else{
                $_SESSION['alertMessage'] = [
                    "type" => "danger",
                    "message" => "Cet email n'existe pas"
                ];
                header("Location: index.php?uc=login&action=show");
            }
        } else {
            $_SESSION['alertMessage'] = [
                "type" => "danger",
                "message" => "Merci de remplir les champs !"
            ];
            header("Location: index.php?uc=login&action=show");
        }
        break;

        case 'validateRegister':
            $firstName = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
            $lastName = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

          

            // si les champs sont pas vides
            if($firstName != "" && $lastName != "" && $email != "" && $password != ""){
                // si l'email n'existe pas
                if(User::IsEmailExisting($email) == false){
                   
                    $user = new User();
                    $user->setNm_Prenom($firstName)
                    ->setNm_Nom($lastName)
                    ->setTxt_Mail($email)
                    ->setPassword($password);

                    User::InscrireUser($user);
                    $_SESSION['alertMessage'] = [
                        "type" => "success",
                        "message" => "L'utilisateur a bien été crée"
                    ];
                    header("Location: index.php?uc=login&action=show");
                }else{
                    $_SESSION['alertMessage'] = [
                        "type" => "danger",
                        "message" => "Cette email existe déjà"
                    ];
                    header("Location: index.php?uc=login&action=showRegister");
                }
            }else{
                $_SESSION['alertMessage'] = [
                    "type" => "danger",
                    "message" => "Merci de remplir les champs !"
                ];
                header("Location: index.php?uc=login&action=showRegister");
            }
            break;

        // déconnexion de l'utilisateur
        case 'deconnecter':
            session_destroy();
            session_unset();
            header('Location: index.php');
            break;

            default :
            header('Location: index.php?uc=login&action=show'); 
            break;

}
