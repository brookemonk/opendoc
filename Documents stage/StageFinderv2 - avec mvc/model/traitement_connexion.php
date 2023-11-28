<?php

    session_start();
    $db = mysqli_connect("localhost", "root", "", "stagefinder");

    // Vérifie si l'utilisateur a déjà un cookie avec ses informations de connexion
    if (isset($_COOKIE['log']) && isset($_COOKIE['mdp'])) {
        $log = $_COOKIE['log'];
        $hashed_mdp = $_COOKIE['mdp'];
    } else {
        $log = '';
        $mdp = '';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $log = $_POST['log'];
        $mdp = $_POST['mdp'];


        $sql = "SELECT id_tuteur, nom_tuteur, prenom_tuteur, log, tel_tuteur, mdp FROM Login, Tuteur WHERE mail_tuteur = log AND log = '$log' AND mdp = '$mdp'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == 1) {
            // Si l'utilisateur est authentifié, crée des cookies pour stocker les informations
            setcookie('log', $log, time() + (86400 * 30), "/");
            $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $_SESSION['log'] = $log;

            $user = mysqli_fetch_assoc($result);
            $_SESSION['id_tuteur'] = $user['id_tuteur'];
            $_SESSION['prenom_tuteur'] = $user['prenom_tuteur'];
            $_SESSION['nom_tuteur'] = $user['nom_tuteur'];
            $_SESSION['mail_tuteur'] = $log;
            $_SESSION['tel_tuteur'] = $user['tel_tuteur'];

            header('Location: ../index.php');
            require('session_manager.php');
            exit;
        } else {
            session_start();
            session_destroy();
            $_SESSION['connected'] = false;
            header('Location: ../index.php');
            exit;
        }
    }

?>
