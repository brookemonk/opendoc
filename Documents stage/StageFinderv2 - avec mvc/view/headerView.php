<link rel="shortcut icon" href="./public/image/logofull.png">

<header>
    <div class="header_logo">
        <form method="GET" action="">
            <button class="btn_header" name="nav" value="0"><img src="./public/image/logotop.png" alt="img-logo"></button>
        </form>
    </div>

    <div class="right">
        <form method="GET" action="">
            <button class="btn_header" name="nav" value="1"><img src="./public/image/search.png" alt="img-search"></button>
            <button class="btn_header" name="nav" value="2"><img src="./public/image/folder.png" alt="img-files"></button>
            <button class="btn_header" name="nav" value="3"><img src="./public/image/profil.png" alt="img-profil"></button>
            <img src="./public/image/menu.png" alt="img-menu" class="expand-menu" onclick="openMenu()">
        </form>
    </div>
</header>

<div id="sideMenuTuteur" class="sidemenututeur">
    <form method="GET" action="">
        <ul>
            <li><img src="./public/image/cross.png" alt="img-close" class="close-menu" onclick="closeMenu()"></li>
            <li><button class="btn_menu" name="nav" value="0">Accueil</button></li>
            <li><button class="btn_menu" name="nav" value="4">Gestion Entreprise</button></li>
            <li><button class="btn_menu" name="nav" value="5">Gestion Elève</button></li></form>
            <li>
                <form action="./model/deconnexion.php" method="POST">
                    <button class="btn_menu">Déconnexion</button>
                </form>
            </li>
        </ul>
</div>