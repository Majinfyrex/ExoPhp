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
    <h1>Commentaire</h1>
    <form action="" method="post">
        <label for="name">Nom :</label><br>
        <input type="text" id="name" name="name"> <br>

        <label for="comment">Commentaire : </label><br>
        <textarea name="comment" id="comment" cols="30" rows="4"></textarea> <br>

        <button type="submit">Envoyer</button>
    </form>

    <?php

    $file = "comment.json";

    if ($_SERVER["REQUEST_METHOD"] === "POST") { //Récupère donnée du form
        $name = htmlspecialchars($_POST["name"]); //html empeche les caractère spéciaux pour eviter faille
        $comment = htmlspecialchars($_POST["comment"]);

        // récupère commentaire existent depuis fichier json
        $comments = [];
        if (file_exists($file)) {
            $data = file_get_contents($file);
            $comments = json_decode($data, true);
        }

        // Ajoute le commentaire
        $comments [] = [
            "name" => $name,
            "comment" => $comment
        ];

        //stock le commentaire dans fichier json
        file_put_contents($file, json_encode($comments, JSON_PRETTY_PRINT));
        // empeche la duplication au rechargement
        header("Location: 04.php");

        echo "Merci pour votre commentaire !";
        //stop le script
        exit;

    }

    //verifie que le fichier existe et récupère les données
    if (file_exists($file)) {
        $data = file_get_contents($file);
        $comments = json_decode($data, true);

        //affiche les commentaires
        if ($comments) {
            foreach ($comments as $comment) {
                echo "<ul>";
                echo "<li>" . $comment["name"] . "<br>";
                echo $comment["comment"] . "</li>" . "<br>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun commentaire trouvé </p>";
        }
    }

    ?>
</body>
</html>


