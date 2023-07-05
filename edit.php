<?php 
include('./model/read-learner.php');
include('./model/read-promotions.php');

 ?>
<section class="edit-page">
    <!-- Ajouter ou modifier un apprenant -->
    <p class="titre">
        Ajouter un nouveau apprenant
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
    <form action="<?= (isset($apprenant))? "./model/update-learner.php":"./model/create-learner.php" ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
            <input type="file" id="avatar" accept="image/png, image/jpeg" name="avatar" value="<?= (isset($apprenant))? 'media/uploads/'.$apprenant['photo']: "" ?>" required>
            <?php 
                if(isset($apprenant)){
                    ?>
                        <img src="<?= "media/uploads/".$apprenant['photo'] ?>" alt="" width="100">
                    <?php
                }
            ?>    
        </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Ex: Drissa Sidiki" value="<?= (isset($apprenant))? $apprenant['prenom']: "" ?>" required>
            </div>

            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Traore"  value="<?= (isset($apprenant))? $apprenant['nom']: "" ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ex: drissasidiki7219@gmail.com"  value="<?= (isset($apprenant))? $apprenant['email']: "" ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Ex: 72196636"  value="<?= (isset($apprenant))? $apprenant['num_tel']: "" ?>"  minlength="8" maxlength="8" required>
                <p class="telephone-error" style="color: red;"></p>
            </div>

            <div class="col">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance"  value="<?= (isset($apprenant))? $apprenant['date_naissance']: "" ?>" minlength="4" maxlength="4" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="promotion">Promotion</label>
                <select name="promotion" id="promotion">
                   <?php
                    foreach($promotions as $promotion){
                        ?>
                       <option value="<?= $promotion['id_pro'] ?>" <?= (isset($apprenant) AND $apprenant['id_pro']==$promotion['id_pro'] )? "selected": "" ?>> <?= $promotion['titre'] ?><option>
                       <?php
                    } 
                   ?>
                </select>
            </div>
            <div class="col">
                <label for="annee_cert">Année de certification</label>
                <input type="text" id="annee_cert" name="annee_cert" max="4" min="4" placeholder="Ex: 2023"  value="<?= (isset($apprenant))? $apprenant['annee_cert']: "" ?>" required>
                <p class="annee_cert-error" style="color: red;"></p>
            </div>
        </div>
        <br>
        <input type="hidden" name="id_app" value="<?= (isset($apprenant))? $apprenant['id_app']: 0 ?>">
        <div class="submit-button">
            <input type="submit" value="Valider" class="submit-button">
        </div>
    </form>
</section>
<?php unset($_SESSION['error']); ?>