<?php
    include_once("header.php")
?>

<main>
    <div>
        <h2 class="m-2 text-center pl-3">Le Zoo et les animaux</h2><br><br>
        <p class="container-fluid pl-4 pr-4">Arcadia est un zoo situé en France près de la forêt de Brocéliande, en
            bretagne depuis 1960. Ils possèdent
            tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs
            santés. Chaque jour, plusieurs vétérinaires viennent afin d’effectuer les contrôles sur chaque animal avant
            l’ouverture du zoo afin de s’assurer que tout se passe bien, de même, toute la nourriture donnée est
            calculée afin d’avoir le bon grammage.</p><br><br><br><br>
        <img src="img/nature.jpg" alt="l'image principale">
        <div class="animaux"><br><br><br><br>
            <h2 class="text-center m-3">Nos Animaux par Habitats</h2>
            <div class="row justify-content-center">
                <div class="card col-3 m-2" style="width: 18rem; background-color: #cdd781;">
                    <div class="card-header">
                        La jungle
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #cdd781;">L'ara rouge</li>
                        <li class="list-group-item" style="background-color: #cdd781;">L'araignée Goliath</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le Jaguar</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le Gorille</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le paresseux</li>
                    </ul>
                </div>
                <div class="card col-3 m-2" style="width: 18rem; background-color: #cdd781;">
                    <div class="card-header">
                        La savane
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #cdd781;">Le zèbre</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le Gnou</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le Buffle d'Amérique</li>
                        <li class="list-group-item" style="background-color: #cdd781;">L'éléphant</li>
                    </ul>
                </div>
                <div class="card col-3 m-2" style="width: 18rem;background-color: #cdd781;">
                    <div class="card-header">
                        Le marais
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #cdd781;">Le canard chipeau</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Hydrous piceus</li>
                        <li class="list-group-item" style="background-color: #cdd781;">Le carpe</li>
                    </ul>
                </div>
            </div>
        </div><br><br><br><br>


            <div class="col-4">
                <section class="">
                    <h2 class="text-left">Laissez nous un avis</h3>
                        <div>Veuillez remplir ce formulaire pour nous laisser un avis.</div>
                        <label for="b-pseudo">Votre nom:</label><br>
                        <input type="text" id="b-pseudo" name="pseudo"><br>
                        <label for="b-comm">Votre avis:</label><br>
                        <textarea id="b-comm" name="commentaire" rows="4" cols="50"></textarea><br>
                        <button class="input" id="b-avis">Soumettre mon avis</button>
                </section>
            </div>
        </div><br><br><br><br>


        <div class="form">
            <h2 class="text-center mb-3 color-red">Avis</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner avislist">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
</main>
<?php
    include_once("footer.php");
?>