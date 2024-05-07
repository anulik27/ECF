<?php
    include_once("header.php");
?>

<div>
            <div class="col-4">
                <section id="contact">
                    <h2>Contactez-nous</h2>
                    <div>Veuillez remplir ce formulaire pour nous contacter.</div>
                    <label for="name">Nom:</label><br>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"><br>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message"></textarea><br>
                    <input type="submit" value="Envoyer">
                </section>
            </div>

<?php
    include_once("footer.php");
?>