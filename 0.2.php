<?php

 function verifAge(int $age){
    if ($age < 18 ) {
        return "mineur";
    } else {
        return "majeur";
    }
}

$age = 20;
$resultat = verifAge($age);
echo $resultat.PHP_EOL;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
    <label for="name">Prénom : </label>
    <input type="text" id="name" name="name">
    <button type="submit">Enregistrer</button>
</form>
    <?php
     if (isset($_GET['name'])) {
         echo "<p>Bonjour, " . $_GET['name'] . "</p>";
     }
    ?>
</body>
</html>
