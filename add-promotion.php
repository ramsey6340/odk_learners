<section class="edit-page">
    <!-- Ajouter ou modifier une promotion -->
    <p class="titre">
        Promotion
    </p>
    <?php 
        if(isset($_SESSION['error']) AND $_SESSION['error']!=''){
            foreach($_SESSION['error'] as $error){
                ?>
                    <p class="error-message"><?= $error ?></p>
                <?php
            }
        }
        if (isset($_SESSION['success'])){
            ?>
            <script>
                alert("Ajout reussi");
            </script>
        <?php
        unset($_SESSION['success']);
        }
    ?>
    <form action="./model/create-promo.php" method="post">
      
        <div class="row">
        <div class="col">
                <label for="titre">Nom de la promotion</label>
                <input type="text" id="titre" name="titre" required>
            </div>
            <div class="col">
                <label for="nbApprenant">Nombre d'apprenant</label>
                <input type="number" id="nbApprenant" name="nbApprenant" required>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <label for="dateDebut">Date de debut</label>
                <input type="date" id="dateDebut" name="dateDebut"required>
            </div>

            <div class="col">
                <label for="dateFin">Date de fin</label>
                <input type="date" id="dateFin" name="dateFin" required>
            </div>
        </div>

        <div class="submit-button">
            <input type="submit" value="Valider" class="submit-button">
        </div>
    </form>
</section>
<?php unset($_SESSION['error']); ?>