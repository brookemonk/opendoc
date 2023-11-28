<?php

// démarrer la session
session_start();

// déconnecter l'utilisateur
unset($_SESSION['connected']);
session_destroy();

// rediriger l'utilisateur vers la page de connexion
header('Location: ../index.php');
exit();

?>


