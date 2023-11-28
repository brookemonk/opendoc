<?php
$db_config = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'database' => 'db_chat4all',
    'port' => 3306
];

// Utilisez une structure try-catch pour gérer les exceptions
try {
    $conn = new mysqli($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database'], $db_config['port']);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT idGPTs, name, description, url_pp, url_gpts FROM gpts";
    $result = $conn->query($sql);

    $gpts = [];

    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gpts[] = $row; // Utilisez [] pour ajouter un élément à un tableau
        }

        // Utilisez header pour définir le type de contenu
        header('Content-Type: application/json');
        echo json_encode($gpts);
    } else {
        echo json_encode(["message" => "Aucun résultat trouvé"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    // Fermez la connexion dans la clause finally pour garantir sa fermeture
    if (isset($conn)) {
        $conn->close();
    }
}
?>
