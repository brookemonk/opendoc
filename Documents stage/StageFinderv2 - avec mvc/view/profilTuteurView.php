<?php 
    $title = "Profil / Stage Finder"; 
?>

<body id="bodyprofil">
    <form action="" method="GET">
        <button class="btn_header" name="nav" value="0"><img src="./public/image/logo.png" alt="Logo Home"></button>
        <h1>Stage Finder</h1>
    </form>

    
        <div class="containerfromprofil">
            <div id="boxnumclient" class="box">
                <h2>Numéro de tuteur : <?= isset($_SESSION['id_tuteur']) ? htmlspecialchars($_SESSION['id_tuteur']) : '' ?></h2>
            </div>
        </div>
        <div class="containerfromprofil">
            <h2>Informations personnelles</h2>
            <div class="box">
                <div class="insidebox">
                    <div class="boxleftside">
                        <p class="infobox">Prénom</p>
                        <input class="infobox" type="text" name="firstname" value="<?= isset($_SESSION['prenom_tuteur']) ? htmlspecialchars($_SESSION['prenom_tuteur']) : '' ?>" id="firstname" readonly>
                        <p class="infobox">Nom</p>
                        <input class="infobox" type="text" name="name" value="<?= isset($_SESSION['nom_tuteur']) ? htmlspecialchars($_SESSION['nom_tuteur']) : '' ?>" id="name" readonly>
                    </div>
                    <div class="boxrightside">
                        <p class="infobox">Email</p>
                        <input class="infobox" type="email" name="email" value="<?= isset($_SESSION['log']) ? htmlspecialchars($_SESSION['log']) : '' ?>" id="email" readonly>
                        <p class="infobox">Numéro de téléphone</p>
                        <input class="infobox" type="text" name="birthdate" id="birthdate" value="0<?= isset($result['tel_tuteur']) ? htmlspecialchars($result['tel_tuteur']) : '' ?>" readonly>
                    </div>
                </div>
                <div id="submitbox">
                    <input type="submit" name="submit" id="submit" value="Validé">
                </div>
            </div>
        </div>
   
    
    <div class="containerfromprofil">
        <h2>Les étudiants</h2>
        <div class="box">
            <?php

                $html = '<table>';
                $html .= '<tr>';
                $html .= '<th class="firstcolumn">Nom</th>';
                $html .= '<th>Prénom</th>';
                $html .= '<th class="statecolumn">Promo</th>';
                $html .= '</tr>';

                foreach ($informations as $row){
                    $html .= '<tr>';
                    $html .= '<td>' . $row['nom_etudiant'] . '</td>';
                    $html .= '<td>' . $row['prenom_etudiant'] . '</td>';
                    $html .= '<td>' . $row['nom_promo'] . '  ' . $row['mineure'] . '</td>';
                    $html .= '</tr>';
                }

                $html .= '</table>';

                echo $html;

            ?>
        </div>
    </div>

    <?php if (isset($_SESSION['log'])): ?>
        <form action="./model/deconnexion.php" method="post">
            <input id="deconnexion" type="submit" value="Déconnexion">
        </form>
    <?php endif; ?>

</body>