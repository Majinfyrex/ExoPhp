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
<h1>Enregistrement</h1>
<form action="" method="post" id="form">
    <label for="name">Prénom : </label>
    <input type="text" id="name" name="name">
    <br>
    <label for="age">Âge : </label>
    <input type="number" id="age" name="age">
    <br>
    <label for="email">Email : </label>
    <input type="text" id="email" name="email">
    <br>
    <button type="submit">Enregistrer</button>
</form>

<?php


    echo "<h2>" . "Afficher la liste" . "</h2>";
    $file ="list.txt"; // créer le fichier

    if ($_SERVER["REQUEST_METHOD"] === "POST") { //Vérifie si formulaire soumis
        $data = $_POST['name'] . ' ' . $_POST['age'] . ' ' . $_POST['email'] . PHP_EOL; // remplie le fichier
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX); // Ecrit le contenu dans le fichier, FILE_APPEND empeche d'écraser
        header("Location: " . $_SERVER["PHP_SELF"]); //
        exit; // Stop le script pour qu'il ne s'éxécute pas
    }

    if (file_exists($file)){ //si le fichier existe
        echo nl2br(file_get_contents($file)); // affiche le fichier avec un saut de ligne
    } else {
        echo "aucune données trouvé";
    }

    echo "<h3>" . "Tableau" . "</h3>";
    if (file_exists($file)){
        $content = file($file); //recup chaque ligne du fichier dans un tab
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Email</th>
                </tr>
              </thead>";
        echo "<tbody>";
        foreach ($content as $line) {
            $data = explode(" ", $line); // divise chaque ligne en colonne
            echo "<tr>";
            echo "<td>" . $data[0] . "</td>"; //affiche le prénom voir ligne 32
            echo "<td>" . $data[1] . "</td>"; // affiche l'age voir ligne 32
            echo "<td>" . $data[2] . "</td>"; // affiche l'email voir ligne 32
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Aucune donnée pour le tableau";
    }


?>

</body>
</html>

