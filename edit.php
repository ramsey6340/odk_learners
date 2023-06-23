<section class="edit-page">
    <!-- Ajouter ou modifier un apprenant -->
    <p>
        Ajouter un nouveau apprenant
    </p>
    <form action="" method="post">
        <div class="row">
            <div class="col">
            <input type="file" id="avatar" accept="image/png, image/jpeg" name="avatar">
            <img src="media/images/default_profile.png" alt="" width="100">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Ex: Drissa Sidiki">
            </div>

            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Traore">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ex: drissasidiki7219@gmail.com">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Ex: 72196636">
            </div>

            <div class="col">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="promotion">Promotion</label>
                <input type="text" id="promotion" name="promotion" max="2" min="2" placeholder="Ex: P3">
            </div>

            <div class="col">
                <label for="annee_cert">Année de certification</label>
                <input type="text" id="annee_cert" name="annee_cert" max="4" min="4" placeholder="Ex: 2023">
            </div>
        </div>
        <br>
        <div class="submit-button">
            <input type="submit" value="Valider">
        </div>
    </form>
</section>