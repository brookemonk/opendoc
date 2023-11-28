<?php 
    $title = "Home / Stage Finder";
?>

<div class="main">
    <div class="containerfromhome">
        <h2>Nouveautés</h2>
        <div class="carousel-container">
        <div class="carousel">
            <img src="./public/image/img_car/agily.avif" alt="creatisweb">
            <img src="./public/image/img_car/creatisweb.avif" alt="horanet">
            <img src="./public/image/img_car/horanet.avif" alt="neosoft">
            <img src="./public/image/img_car/neosoft.avif" alt="agily">
        </div>
        <div class=" carousel-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</div>

<div class="containerfromhome">
    <div class="split">

        <div class="boxleftside">
            <div class="boxforcolumns">
                <h2>Les étudiants</h2>
                <div id="tablediv">
                    <div id="scrolldiv">
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
            </div>
        </div>

        <div class="boxrightside">
          <div class="boxforcolumns">
            <h2>Demandes urgentes</h2>
            <div class="carouselbis-container">
              <div class="carouselbis">
                <img src="./public/image/img_carbis/atos.avif" alt="atos">
                <img src="./public/image/img_carbis/eiffage.avif" alt="eiffage">
                <img src="./public/image/img_carbis/ibm.avif" alt="ibm">
                <img src="./public/image/img_carbis/idec.avif" alt="webuz">
                <img src="./public/image/img_carbis/vincicons.avif" alt="idec">
                <img src="./public/image/img_carbis/webuz.avif" alt="vincicons">
              </div>
            </div>
            <div class=" carouselbis-dots">
              <span class="dotbis active"></span>
              <span class="dotbis"></span>
              <span class="dotbis"></span>
              <span class="dotbis"></span>
              <span class="dotbis"></span>
              <span class="dotbis"></span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<script src="./public/scripts/script_carrousel.js"></script>