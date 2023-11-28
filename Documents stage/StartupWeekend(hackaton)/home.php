<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPTs4All</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="headerfooter.css">
    <link rel="shortcut icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-dvBpYsWlC2PmXvFtRQApZLveCy9C7fghxqjRbx9oaDhRFe5o5MsC1tmE3... " crossorigin="anonymous">

</head>


<body>
    <header>
       <div id="logoo">
            <a href="home.php"><img src="./images/logo.png" alt="logo"></a>
        </div>
        <div><h1>GPTs4All</h1></div>
        <div id="categories">
            <a href="home.php">
                <p style="text-decoration: underline 2px;text-underline-position:under ;
                    color: black;">HOME</p>
            </a>
            <a href="creators.php">
                <p>CREATORS</p> 
            </a>
        </div>
    </header>
    

    <div class="search-container">
        <form action="/recherche.php" method="get">
            <input type="text" placeholder="Rechercher..." name="q" id="search-input" class="search-input">
            <button type="submit" class="search-icon"><i class="fas fa-search"></i></button>
        </form>
    </div>

    
    <div id="main">
        <div id="filters" class="mainboxes">
            <a href="#"><p>Présentation</p></a>
            <a href="#"><p>Mathématique</p></a>
            <a href="#"><p>Design</p></a>
            <a href="#"><p>Productivité</p></a>
            <a href="#"><p>Jeux</p></a>
            <a href="#"><p>Style</p></a>
            <a href="#"><p>Communication</p></a>
            <a href="#"><p>Développement</p></a>
            <a href="#"><p>Informatique</p></a>
            <a href="#"><p>Voyage</p></a>
            <a href="#"><p>Histoire</p></a>
            <a href="#"><p>Divers</p></a>
            <div class="lastParam"></div>
        </div>
        <div id="gpts" class="mainboxes">
            <section id="gpt-extensions">
                <!-- Liste des extensions -->
                <ul id="extension-list">
                    <!-- Les éléments seront ajoutés dynamiquement ici -->
                </ul>
            </section>
            <div id="pagination-container">
                <button id="page-precedente">Précédent</button>
                 <span id="num-page">Page 1</span>
                <button id="page-suivante">Suivant</button>
            </div>
        </div>
    </div>

    <footer>
        <div>
            <p>© 2023 GPTs4All</p>
        </div>
    </footer>

<script src="./script.js"></script>
</body>
</html>
