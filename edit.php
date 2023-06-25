<?php include('./model/read-learner.php'); ?>
<section class="edit-page">
    <!-- Ajouter ou modifier un apprenant -->
    <p>
        Ajouter un nouveau apprenant
    </p>
    <form action="<?= (isset($apprenant))? "./model/update-learner.php":"./model/create-learner.php" ?>" method="post">
        <div class="row">
            <div class="col">
            <input type="file" id="avatar" accept="image/png, image/jpeg" name="avatar" required>
            <img src="media/images/default_profile.png" alt="" width="100">
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
                <input type="tel" id="telephone" name="telephone" placeholder="Ex: 72196636"  value="<?= (isset($apprenant))? $apprenant['telephone']: "" ?>" required>
            </div>

            <div class="col">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance"  value="<?= (isset($apprenant))? $apprenant['date_naissance']: "" ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="promotion">Promotion</label>
                <select name="promotion" id="promotion"  value="<?= $apprenant['promotion'] ?>" required>
                    <option value="">--Choisir la promotion--</option>
                    <option value="P1" <?= (isset($apprenant) AND $apprenant['promotion']=='P1')? 'selected': '' ?>>P1</option>
                    <option value="P2" <?= (isset($apprenant) AND $apprenant['promotion']=='P2')? 'selected': '' ?>>P2</option>
                    <option value="P3" <?= (isset($apprenant) AND $apprenant['promotion']=='P3')? 'selected': '' ?>>P3</option>
                </select>
            </div>

            <div class="col">
                <label for="annee_cert">Année de certification</label>
                <input type="text" id="annee_cert" name="annee_cert" max="4" min="4" placeholder="Ex: 2023"  value="<?= (isset($apprenant))? $apprenant['annee_cert']: "" ?>" required>
            </div>
        </div>
        <br>
        <input type="hidden" name="id_app" value="<?= (isset($apprenant))? $apprenant['id_app']: 0 ?>">
        <div class="submit-button">
            <input type="submit" value="Valider">
        </div>
    </form>
</section>