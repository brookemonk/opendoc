<?php
    $title = "Search / Stage Finder"; 
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
    $sql = "SELECT DISTINCT Offre.id_offre, nom_offre, nom_entreprise, description_offre, duree_stage, ville_offre, nom_promo 
    FROM `Offre`, Offre_Promo, Promo 
    WHERE Offre.id_offre = Offre_Promo.id_offre AND Offre_Promo.id_promo = Promo.id_promo 
    AND (nom_offre LIKE '%$search%' OR nom_entreprise LIKE '%$search%' OR ville_offre LIKE '%$search%' OR nom_promo LIKE '%$search%')";
    $result = $conn->query($sql);
    
    // Stockage des résultats dans un tableau
    $stages = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $stages[] = $row;
        }
    }
    
    $conn->close();
?>

    <main>

        <div class="filters">

            <form method="POST" action="">

                <div class="filtre">
                    <input type="text" id="search" name="search" placeholder=" Recherche">
        
                    <hr>
        
                    <table cellspacing="0" cellpadding="0" id="click-menu1" class="click-menu">
                        <tr>
                            <td class="tablesearch">
                                <div class="box1" id="box1-0">Mineure <img id="img_1" src="./public/image/fleche.png" width="15" height="15" style="margin-top: 8px;" alt="fleche"></div>
                                <div class="section">
                                    <div class="box2"><input type="checkbox" name="mineure">BTP         </div>
                                    <div class="box2"><input type="checkbox" name="mineure">Généraliste </div>
                                    <div class="box2"><input type="checkbox" name="mineure">Informatique</div>
                                    <div class="box2"><input type="checkbox" name="mineure">S3E         </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tablesearch" height="2"></td>
                        </tr>
                        <tr>
                            <td class="tablesearch">
                                <div class="box3" id="box3-0">Niveau <img id="img_2" src="./public/image/fleche.png" width="15" height="15" style="margin-top: 8px;" alt="fleche"></div>
                                    <div class="section">
                                        <div class="box2"><input type="checkbox" name="niveau">A2</div>
                                        <div class="box2"><input type="checkbox" name="niveau">A3</div>
                                        <div class="box2"><input type="checkbox" name="niveau">A4</div>
                                        <div class="box2"><input type="checkbox" name="niveau">A5</div>
                                    </div>
                                </td>
                            </tr>
                        <tr>
                            <td class="tablesearch" height="2"></td>
                        </tr>
                        <tr>
                            <td class="tablesearch">
                                <div class="box4">Ville <img id="img_3" src="./public/image/fleche.png" width="15" height="15" style="margin-top: 8px;" alt="fleche"></div>
                                    <div class="section">
                                        <div class="box2"><input type="text" name="ville" placeholder=" Nom de la ville"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablesearch" height="2"></td>
                            </tr>
                            <tr>
                                <td class="tablesearch">
                                    <div class="box5">Durée <img id="img_4" src="./public/image/fleche.png" width="15" height="15" style="margin-top: 8px;" alt="fleche"></div>
                                    <div class="section">
                                        <div class="box2"><input type="text" name="duree" placeholder=" Nombre de semaines"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablesearch" height="2"></td>
                            </tr>
                            <tr>
                                <td class="tablesearch">
                                    <div class="box6">Urgence <img id="img_5" src="./public/image/fleche.png" width="15" height="15" style="margin-top: 8px;" alt="fleche"></div>
                                    <div class="section">
                                        <div class="box2"><input type="checkbox" name="urgence" value="Oui">OUI</div>
                                        <div class="box2"><input type="checkbox" name="urgence" value="Non">NON</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input id="btn_filtre" type="submit" value="Appliquer les filtres"><br>
                        <a href="#">Réinitialiser</a>
                    </div>
                </div>

            </form>


        <div class="annonces">

            <?php

                $parPage = 4;
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

    </main>


    <?php

        if ($totalPages > 1) {
            echo '<div class="pagination">';
            if ($pageCourante > 1) {
                echo '<a href="?nav=1&page=' .  ($pageCourante - 1) . '">  &lt;  </a>';
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $pageCourante) {
                    echo '<span class="current-page"> ' .  $i  . ' </span>';
                } else {
                    echo '<a href="?nav=1&page=' .  $i  . '"> ' .  $i  . ' </a>';
                }
            }
            if ($pageCourante < $totalPages) {
                echo '<a href="?nav=1&page=' .  ($pageCourante + 1) . '">  &gt;  </a>';
            }
            echo '</div>';
        }

    ?>
   