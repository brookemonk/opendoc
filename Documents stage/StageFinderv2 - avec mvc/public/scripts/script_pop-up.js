/////////// POP-UP ///////////// 
// Récupération de la pop-up
var modal = document.getElementById("add-offre-modal");

// Récupération du bouton de fermeture de la pop-up
var span = document.getElementsByClassName("close")[0];

// Récupération du bouton qui ouvre la pop-up
var addBtn = document.querySelector("#add-offre-form");

// Quand l'utilisateur clique sur le bouton "Ajouter", la pop-up s'ouvre
addBtn.onclick = function(event) {
    event.preventDefault(); // empêche le comportement par défaut du bouton
    modal.style.display = "block";
}

// Quand l'utilisateur clique sur le bouton de fermeture, la pop-up se ferme
span.onclick = function() {
    modal.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la pop-up, la pop-up se ferme
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Récupération de la pop-up
var modalEdit = document.getElementById("edit-offre-modal");

// Récupération du bouton de fermeture de la pop-up
var spanEdit = document.getElementsByClassName("close-edit")[0];

// Récupération du bouton qui ouvre la pop-up
var editBtn = document.querySelector("#edit-offre-form");

// Quand l'utilisateur clique sur le bouton "Modifier", la pop-up s'ouvre
editBtn.onclick = function(event) {
    event.preventDefault(); // empêche le comportement par défaut du bouton
    modalEdit.style.display = "block";
    var idOffre = event.target.value;
    document.getElementById("id-offre").value = idOffre;
}

// Quand l'utilisateur clique sur le bouton de fermeture, la pop-up se ferme
spanEdit.onclick = function() {
    modalEdit.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la pop-up, la pop-up se ferme
window.onclick = function(event) {
    if (event.target == modalEdit) {
        modalEdit.style.display = "none";
    }
}


function updateStages() {
    $.ajax({
      url: './view/gestionStageView.php',
      method: 'POST',
      dataType: 'json',
      success: function(response) {
        // Mettre à jour les offres de stage avec les nouvelles données
        for(var i=0; i<response.length; i++) {
          var offreDeStage = response[i];
          // Mettre à jour les offres de stage avec les données de chaque offreDeStage
          var idOffreDeStage = offreDeStage.id_offre;
          var titreOffreDeStage = offreDeStage.nom_offre;
          var descriptionOffreDeStage = offreDeStage.description_offre;
          var dureeOffreDeStage = offreDeStage.duree_stage;
          var entrepriseOffreDeStage = offreDeStage.nom_entreprise;
          var promOffreDeStage = offreDeStage.nom_promo;
          
          // Trouver l'offre de stage correspondante dans le HTML
          var offreDeStageHTML = $('#' + idOffreDeStage);
          
          // Mettre à jour les données de l'offre de stage dans le HTML
          offreDeStageHTML.find('.nom_offre').text(titreOffreDeStage);
          offreDeStageHTML.find('.description_offre').text(descriptionOffreDeStage);
          offreDeStageHTML.find('.duree_stage').text(dureeOffreDeStage);
          offreDeStageHTML.find('.nom_entreprise').text(entrepriseOffreDeStage);
          offreDeStageHTML.find('.nom_promo').text(promoOffreDeStage);
        }
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
}
  
  
