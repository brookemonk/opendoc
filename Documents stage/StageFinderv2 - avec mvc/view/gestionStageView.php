<?php
    $title = "Offres Stages / Stage Finder"; 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stagefinder";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Récupération de la valeur de l'input search
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    
    // Requête SQL pour récupérer les stages correspondant à la recherche
    $sql = "SELECT DISTINCT Offre.id_offre, nom_offre, nom_entreprise, description_offre, duree_stage, ville_offre, nom_promo, rh.id_rh, nom_rh, prenom_rh, mail_rh, tel_rh 
    FROM Offre, Offre_Promo, Promo, rh, entreprise_rh 
    WHERE Offre.id_offre = Offre_Promo.id_offre AND Offre_Promo.id_promo = Promo.id_promo AND rh.id_RH = entreprise_rh.id_rh 
    AND (nom_offre LIKE '%$search%' OR nom_entreprise LIKE '%$search%' OR ville_offre LIKE '%$search%' OR nom_promo LIKE '%$search%') GROUP BY Offre.id_offre;";
    $result = $conn->query($sql);
    
    // Stockage des résultats dans un tableau
    $stages = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $stages[] = $row;
        }
    }

    // Ajout d'une offre dans la base de données
    if (isset($_POST['add-offre'])) {
        $nom_offre = $_POST['nom_offre'];
        $nom_entreprise = $_POST['nom_entreprise'];
        $description_offre = $_POST['description_offre'];
        $duree_stage = $_POST['duree_stage'];
        $ville_offre = $_POST['ville_offre'];
        $id_rh = $_POST['id_rh'];
    
        $sql = "INSERT INTO Offre (nom_offre, nom_entreprise, description_offre, duree_stage, ville_offre, id_rh)
            VALUES ('$nom_offre', '$nom_entreprise', '$description_offre', '$duree_stage', '$ville_offre', '$id_rh')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Offre ajoutée avec succès !";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
    
    // $conn->close();
?>

<div class="search">
    <form class="form_search_bis" action="" method="POST">
        <input type="text" id="search_bis" name="search" placeholder="Recherche">
    </form>
        <div class="btn_search_bis">
            <button id="add-offre-form" name="offre" value="0">Ajouter</button>
            <button name="offre" value="1">Supprimer</button>
            <button id="edit-offre-form" name="offre">Modifer</button>
        </div>
    
</div>

<!-- Pop-up pour ajouter une offre -->
<div id="add-offre-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter une offre</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form method="POST" action="">
                <label for="nom-offre">Nom de l'offre:</label><br>
                <input type="text" id="nom-offre" name="nom_offre"><br>
                <label for="nom-entreprise">Nom de l'entreprise:</label><br>
                <input type="text" id="nom-entreprise" name="nom_entreprise"><br>
                <label for="description-offre">Description de l'offre:</label><br>
                <textarea id="description-offre" name="description_offre"></textarea><br>
                <label for="duree-stage">Durée du stage:</label><br>
                <input type="text" id="duree-stage" name="duree_stage"><br>
                <label for="ville-offre">Ville de l'offre:</label><br>
                <input type="text" id="ville-offre" name="ville_offre"><br>
                <label for="promo">Promotion:</label><br>
                <select id="promo" name="id_promo">
                    <option value="1">A2 BTP</option>
                    <option value="3">A4 BTP</option>
                </select><br>
                <button type="submit" name="submit-offre">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php
    // Vérifie si le formulaire a été soumis
    if(isset($_POST['submit-offre'])) {
        // Récupération des données du formulaire
        $nom_offre = isset($_POST['nom_offre']) ? $_POST['nom_offre'] : '';
        $description_offre = isset($_POST['description_offre']) ? $_POST['description_offre'] : '';
        $duree_stage = isset($_POST['duree_stage']) ? $_POST['duree_stage'] : '';
        $ville_offre = isset($_POST['ville_offre']) ? $_POST['ville_offre'] : '';
        $id_promo = isset($_POST['id_promo']) ? $_POST['id_promo'] : '';

        // Requête SQL pour insérer les données dans la table Offre
        $sql = "INSERT INTO Offre (nom_offre, description_offre, duree_stage, ville_offre) VALUES ('$nom_offre', '$description_offre', '$duree_stage', '$ville_offre')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Requête SQL pour insérer les données dans la table Offre_Promo
        $sql = "INSERT INTO Offre_Promo (id_offre, id_promo) VALUES ('$last_id', '$id_promo')";
        if ($conn->query($sql) === TRUE) {
            // Offre ajoutée avec succès
            echo '<script>alert("Offre ajoutée avec succès !");</script>';
            header('Location: ./view/gestionStageView.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!-- Pop-up pour modifier une offre -->
<div id="edit-offre-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Modifier une offre</h2>
            <span class="close-edit">&times;</span>
        </div>
        <div class="modal-body">
            <form method="POST" action="">
                <label for="id-offre-edit">Id de l'offre:</label><br>
                <input type="text" id="id-offre-edit" name="id_offre-edit">
                <label for="nom-offre-edit">Nom de l'offre:</label><br>
                <input type="text" id="nom-offre-edit" name="nom_offre-edit"><br>
                <label for="nom-entreprise-edit">Nom de l'entreprise:</label><br>
                <input type="text" id="nom-entreprise-edit" name="nom_entreprise-edit"><br>
                <label for="description-offre-edit">Description de l'offre:</label><br>
                <textarea id="description-offre-edit" name="description_offre-edit"></textarea><br>
                <label for="duree-stage-edit">Durée du stage:</label><br>
                <input type="text" id="duree-stage-edit" name="duree_stage-edit"><br>
                <label for="ville-offre-edit">Ville de l'offre:</label><br>
                <input type="text" id="ville-offre-edit" name="ville_offre-edit"><br>
                <label for="promo">Promotion:</label><br>
                <select id="promo" name="id_promo-edit">
                    <option value="1">A2 BTP</option>
                    <option value="3">A4 BTP</option>
                </select><br>
                <button type="submit" name="submit-edit-offre">Modifier</button>
            </form>
        </div>
    </div>
</div>


<?php
    if (isset($_POST["id_offre-edit"])) {
        $idOffre = $_POST["id_offre-edit"];
        $nomOffre = $_POST['nom_offre-edit'];
        $descriptionOffre = $_POST['description_offre-edit'];
        $dureeStage = $_POST['duree_stage-edit'];
        $villeOffre = $_POST['ville_offre-edit'];
        $nomEntreprise = $_POST['nom_entreprise-edit'];
        $idPromo = isset($_POST['id_promo-edit']) ? $_POST['id_promo-edit'] : '';

        // Requête SQL pour récupérer les informations de l'offre à partir de la base de données
        $sql_edit = "UPDATE Offre 
        SET nom_offre = '$nomOffre', 
            description_offre = '$descriptionOffre', 
            duree_stage = $dureeStage,
            nom_entreprise = '$nomEntreprise',
            ville_offre = '$villeOffre' 
        WHERE id_offre = $idPromo;
        
        INSERT INTO offre_promo (id_promo, id_offre) VALUES
        ($idPromo , $idOffre);";
    }

    $conn->close();
?>




<div class="offres">
    <?php

        $parPage = 3;
        $totalStages = count($stages);
        $totalPages = ceil($totalStages / $parPage);
                
        $pageCourante = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($pageCourante > $totalPages) {
            $pageCourante = $totalPages;
        }
                
        $depart = ($pageCourante - 1) * $parPage;
        $stagesPage = array_slice($stages, $depart, $parPage);
                
        foreach ($stagesPage as $stage) {
            include('stageCard.php');
        }

        if (count($stages) == 0) {
            echo '<p class="no_result">Aucun résultat trouvé pour votre recherche...</p>';
        }

    ?>
</div>

<?php

if ($totalPages > 1) {
    echo '<div class="pagination">';
    if ($pageCourante > 1) {
        echo '<a href="?nav=4&page=' .  ($pageCourante - 1) . '">  &lt;  </a>';
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $pageCourante) {
            echo '<span class="current-page"> ' .  $i  . ' </span>';
        } else {
            echo '<a href="?nav=4&page=' .  $i  . '"> ' .  $i  . ' </a>';
        }
    }
    if ($pageCourante < $totalPages) {
        echo '<a href="?nav=4&page=' .  ($pageCourante + 1) . '">  &gt;  </a>';
    }
    echo '</div>';
}

?>

<script src="./public/scripts/script_pop-up.js"></script>