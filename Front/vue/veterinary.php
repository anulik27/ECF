<?php
session_start();
if($_SESSION["ROLE"] != "VETERINARY")
    header("Location: ../index.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Veterinaire</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/veterinary.css">
  </head>

<body>
  <header>
    <h1>Espace vétérinaire</h1>
    <img src="../img/ecologie.jpg">
  </header>
  <nav>
    <a href="#">VETERINAIRE</a> |
    <a href="../index.php">Retour Acceuil</a> |
    <a href="../deconnexion.php">Déconnexion</a>
  </nav>

    <div class="row">
    <section class="col-sm-3">
    <div class="form">
      <h3 class="d-flex justify-content-between">
        <strong>Animaux</strong>
      </h3>
      <div class="section-div animaux">
      </div>
    </div>
    </div>
    </section>
    <div class="d-flex">
    <section>
      <div class="form">
        <h3>Control</h3>
        <select class="input" id="cdate">
        </select> 
        <select class="input" id="canimal"></select>
      </div>
    </section>
    <section>
      <div class="form-rapport section-div rapport">
      </div>
    </section>
  </div>

  <!-- Animal Modal -->
  <div class="modal fade" id="animalModal" tabindex="-1" role="dialog" aria-labelledby="Animal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Animal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="aid">
          <input type="date" placeholder="Date de passage ..." id="adate"><br>
          <textarea cols="30" rows="20" class="mt-2" id="adetail" placeholder="Renseigner le détail de l'animal ainsi que la nourriture données et le grammages:"></textarea><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" id="am" onclick="saveVeterinaire()" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="../scripts/veterinary.js"></script>
  </body>
</html>