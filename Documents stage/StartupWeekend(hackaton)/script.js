// document.addEventListener('DOMContentLoaded', function () {
//     fetch('fetch_gpts.php')
//         .then(response => response.json())
//         .then(data => {
//             const list = document.getElementById('extension-list');
//             data.forEach(gpt => {

//                 const listItem = document.createElement('li');
//                 listItem.innerHTML = `<div class="card">
//                    <div class="image"><img src="${gpt.url_pp}" alt="logoGTP"></div>
//                    <div class="nom"><h1>${gpt.name}</h1></div>
//                    <div class="description"><p>${gpt.description}<p></div>
//                    <div class="redirect"><a href="${gpt.url_gpts}"><p>Try GTP extension</p></div>
//                 </div>`;
//                 // <strong>${gpt.name}</strong>: ${gpt.description}, ${gpt.url_pp}, ${gpt.url_gpts}
//                 list.appendChild(listItem);

//             });
//         });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const listeElements = document.getElementById('extension-list');
//     const pagePrecedenteButton = document.getElementById('page-precedente');
//     const pageSuivanteButton = document.getElementById('page-suivante');
//     const numPageSpan = document.getElementById('num-page');

//     const elementsParPage = 16;
//     let pageActuelle = 1;

//     function afficherElements(page) {
//         const debut = (page - 1) * elementsParPage;
//         const fin = debut + elementsParPage;
//         const elements = document.querySelectorAll('#extension-list li');

//         elements.forEach((element, index) => {
//             if (index >= debut && index < fin) {
//                 element.style.display = 'inline-block';
//             } else {
//                 element.style.display = 'none';
//             }
//         });

//         numPageSpan.textContent = `Page ${page}`;
//     }

//     function pagePrecedente() {
//         if (pageActuelle > 1) {
//             pageActuelle--;
//             afficherElements(pageActuelle);
//         }
//     }

//     function pageSuivante() {
//         const totalPages = Math.ceil(listeElements.children.length / elementsParPage);
//         if (pageActuelle < totalPages) {
//             pageActuelle++;
//             afficherElements(pageActuelle);
//         }
//     }

//     pagePrecedenteButton.addEventListener('click', pagePrecedente);
//     pageSuivanteButton.addEventListener('click', pageSuivante);

//     // Afficher la première page au chargement
//     afficherElements(pageActuelle);
// });

document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch_gpts.php')
        .then(response => response.json())
        .then(data => {
            const list = document.getElementById('extension-list');
            const elementsParPage = 16;
            let pageActuelle = 1;

            function afficherElements(page) {
                const debut = (page - 1) * elementsParPage;
                const fin = debut + elementsParPage;

                data.forEach((gpt, index) => {
                    const listItem = list.children[index];
                    if (index >= debut && index < fin) {
                        listItem.style.display = 'inline-block';
                    } else {
                        listItem.style.display = 'none';
                    }
                });

                numPageSpan.textContent = `Page ${page}`;
            }

            const pagePrecedenteButton = document.getElementById('page-precedente');
            const pageSuivanteButton = document.getElementById('page-suivante');
            const numPageSpan = document.getElementById('num-page');

            function pagePrecedente() {
                if (pageActuelle > 1) {
                    pageActuelle--;
                    afficherElements(pageActuelle);
                }
            }

            function pageSuivante() {
                const totalPages = Math.ceil(data.length / elementsParPage);
                if (pageActuelle < totalPages) {
                    pageActuelle++;
                    afficherElements(pageActuelle);
                }
            }

            pagePrecedenteButton.addEventListener('click', pagePrecedente);
            pageSuivanteButton.addEventListener('click', pageSuivante);

            // Initialiser les éléments avec la première page au chargement


            // Créer les éléments de la liste avec les données récupérées
            data.forEach(gpt => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<div class="card">
                   <div class="image"><img src="${gpt.url_pp}" alt="logoGTP"></div>
                   <div class="nom"><h1>${gpt.name}</h1></div>
                   <div class="description"><p>${gpt.description}</p></div>
                   <div class="redirect"><a href="${gpt.url_gpts}"><p>Try GTP extension</p></a></div>
                </div>`;
                list.appendChild(listItem);
            });
            afficherElements(pageActuelle);
        });
});