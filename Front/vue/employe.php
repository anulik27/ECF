<?php
session_start();
if($_SESSION["ROLE"] != "EMPLOYE")
    header("Location: ../index.php");
?>

<!doctype html>
<html lang="en">

<head>
  <title>Employe</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/employe.css">
</head>

<body>
  <header>
    <h1>Espace employe</h1>
    <img src="../img/ecologie.jpg">
  </header>
  <nav>
    <a href="#">EMPLOYE</a> |
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
    </section>
    
    <section class="col-sm-3">
      <div class="form">
        <h3 class="d-flex justify-content-between">
          <strong>Services</strong>
        </h3>
        <div class="section-div service">
        </div>
      </div>
    </section>
    <section class="col-sm-3">
      <div class="form">
        <h3 class="d-flex justify-content-between">
          <strong>Avis</strong>
        </h3>
        <div class="section-div avis">
        </div>
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
          <input type="date" placeholder="Date de passage ..." id="adate">
          <input type="time" placeholder="Heure de passage ..." id="atime"><br>
          <input type="text" placeholder="Nourritures données ..." id="anourriture"><br>
          <input type="text" placeholder="Quantité en grammes..." id="aquantité"><br>
          </select><br>
          <div>
            <span id="save-animal-error"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" id="am" onclick="saveAlimentation()" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Service Modal -->
  <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="Service" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="sid">
          <input type="text" placeholder="Name ..." id="sname">
          <textarea id="sdescription" cols="30" rows="10" placeholder="Description ...."></textarea>
          <div>
            <span id="save-service-error"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" id="sm" onclick="updateService()" class="btn btn-primary">Modifier</button>
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
  <script src="../scripts/employe.js"></script>
</body>

</html>