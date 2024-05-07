<?php
session_start();
$error = "";

if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    // URL de l'API à appeler
    $url = 'http://localhost:8888/zoo/api/user.php?';
    $data = "username=" .  $_POST["email"] . "&password=" . $_POST["password"];

    // Configuration du contexte HTTP pour la requête POST
    $options = array(
        'http' => array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/x-www-form-urlencoded'
        )
    );

    // Crée un contexte HTTP
    $context  = stream_context_create($options);

    $url .= $data;
    // Envoie la requête POST à l'API et récupère la réponse
    $response = json_decode(file_get_contents($url, true, $context));

    if($response->response == "NOT_FOUND") {
        $error = "User not found";
    } else if($response->response == "EMPLOYE") {
        $_SESSION["ROLE"] = "EMPLOYE";
        header("Location: employe.php");
    } else if($response->response == "ADMIN") {
        $_SESSION["ROLE"] = "ADMIN";
        header("Location: admin.php");
    } else if($response->response == "VETERINARY") {
        $_SESSION["ROLE"] = "VETERINARY";
        header("Location: veterinary.php");
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Arcadia Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/connexion.css">
</head>
<body>
    <header>
        <h1>Aracadia Zoo</h1>
        <img src="../img/ecologie.jpg">
    </header>
    <nav>
        <a href="../index.php">Retour Acceuil</a>
    </nav>
    <section class="text-center mt-5" id="connexion">
        <form class="form" method="post">
            <h2>Connexion</h2>
            <input type="email" placeholder="@email.com" id="email" name="email" required><br>
            <input type="password" placeholder="* * * * * *" id="password" name="password" required><br>
            <input type="submit" value="Se connecter" class="submit"> <br>
            <span class="m-4 p-1 error"> <?php echo $error;?> </span>
        </form>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>