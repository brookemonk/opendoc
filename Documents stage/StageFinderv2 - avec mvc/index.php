<?php

    session_start();

    if (isset($_SESSION['log'])) {
        // L'utilisateur est déjà connecté, on affiche le contenu principal
        require("./controller/controller.php");

        try {
            
            $action = isset($_GET['nav']);
            $button_value = isset($_GET['nav']) ? $_GET['nav'] : 0;

            switch($button_value){
                case '0':
                    include('./view/headerView.php');
                    listInformation();
                    include('./view/footerView.php');
                    break;
                case '1':
                    include('./view/headerView.php');
                    listStage();
                    include('./view/footerView.php');
                    break;
                case '3':
                    listProfilTuteur();
                    break;
                case '4':
                    include('./view/headerView.php');
                    listInfoStage();
                    include('./view/footerView.php');
                    break;
                case '6':
                    include('./view/headerView.php');
                    include('./view/mentionsView.php');
                    include('./view/footerView.php');
                    break;
                case '7':
                    include('./view/headerView.php');
                    include('./view/contactView.php');
                    include('./view/footerView.php');
                    break;
                case '8':
                    include('./view/headerView.php');
                    include('./view/proposView.php');
                    include('./view/footerView.php');
                    break;
                case '9':
                    include('./view/headerView.php');
                    include('./view/cookiesView.php');
                    include('./view/footerView.php');
                    break;
                default:
                    include('./view/headerView.php');
                    listInformation();
                    include('./view/footerView.php');
                    $button_value = 0;
                    break;
            }
        } catch (Exception $e) {
            require('./view/exceptionView.php');
        }

        $content = ob_get_clean();

    } else {
        // L'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        require('./view/connexionView.php');
        $content = ob_get_clean();
    }
    $title = "Stage Finder";
    require('./view/template.php');

?>
