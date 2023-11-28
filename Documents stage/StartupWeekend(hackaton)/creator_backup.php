<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPTs4All</title>
    <link rel="stylesheet" href="headerfooter.css">
    <link rel="shortcut icon" href="./images/logo.png" />
    <link rel="stylesheet" href="creator.css">

</head>
<body>
    <header>
       <div id="logoo">
            <a href="home.php"><img src="./images/logo.png" alt="logo"></a>
        </div>
        <div><h1>GPTs4All</h1></div>
        <div id="categories">
            <a href="home.php">
                <p>HOME</p>
            </a>
            <a href="creators.php">
                <p style="text-decoration: underline 2px;text-underline-position:under ;
                    color: black;">CREATORS</p> 
            </a>
        </div>
    </header>
<div class="container">
    <h2 class="mb-4">GPTs creator</h2>

    <form id="createurForm" action="" method="post">
        <div class="form-group">
            <label for="nom">Nom </label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description </label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="url">Url </label>
            <input type="url" class="form-control" id="url" name="url" required>
        </div>

        <div class="form-group">
    <label for="photo">Sélectionnez une image </label>
    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
</div>
        <button type="submit" class="btn-primary">Ajouter</button>
        
    </form>
</div>

<footer>
    <div>
        <p>© 2023 GPTs4All</p>
    </div>
</footer>

<?php
$db_config = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'database' => 'db_chat4all',
    'port' => 3306
];

$conn = new mysqli($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database'], $db_config['port']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$url = mysqli_real_escape_string($conn, $_POST['url']);



$sql = "INSERT INTO gpts (name, description, url_gpts) VALUES ('$nom', '$description', '$url')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel enregistrement créé avec succès.";
    header("Location: success.php"); // Redirection vers success.php
    exit(); 
} else {
    echo "Erreur lors de la création de l'enregistrement : " . $conn->error;
    header("Location: failed.php"); // Redirection vers success.php
    exit(); 
}

$conn->close();
?>

<script>
    $(document).ready(function () {
    
        $('#createurForm').submit(function (event) {
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var photo = $('#photo').val();

            if (!nom || !prenom || !photo) {
                alert('Veuillez remplir tous les champs.');
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>
