<?php 
    $title = "Connexion / Stage Finder"; 
?>

<body id="connexion">

<div class="rectangle"> 
    <img class="img">
</div>

<form class="forme" method="POST" action="./model/traitement_connexion.php">
    <div class="connexion">
        <fieldset>
            <h1>Connectez-vous !</h1><br>

            <div class="container">

                <class class="inputBox">
                    <input type="text" name="log" required="required">
                    <span>Nom d'utilisateur, e-mail</span>
                </class><br><br><br>
  
                <class class="inputBox">
                    <input type="password" name="mdp" required="required">
                    <span>Mot de passe</span>
                </class>

            </div><br><br>

            <hr>

            <input id="btn_connexion" type="submit" value="Connexion"><br>
            <input id="btn_mdp" type="submit" value="Mot de passe oublié ?"><br>
            <a href="#">S'inscrire</a>
        </fieldset>
    </div>
</form>


<footer id="footer_connexion">
    <img src="./public/image/logo_footer.png" alt="logo_footer">
</footer>

</body>