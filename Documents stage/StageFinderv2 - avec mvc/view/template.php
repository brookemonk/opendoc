<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="./public/image/logofull.png">
    <link href="./public/styles/style.css" rel="stylesheet" />
    <link rel="manifest" href="./manifest.json">
</head>
<body>
        
    <?= $content; ?>

    <script src="./public/scripts/script.js"></script>
    <script src="./serviceWorker.js"></script>
    <script>
        if('serviceWorker' in navigator){
            navigator.serviceWorker.register('serviceWorker.js')
            .then((sw) => console/log('Le Service Worker a été enregistrer.', sw))
            .catch((err) => console.log('Le Service Worker est introuvable.', err));
        }
    </script>
</body>
</html>