<?php include('./model/read-learners.php'); ?>
<section class="list-page">
            <!-- Contenue principal de la page -->
            <table>
                <thead class="table-head">
                    <td>Prenom et Nom</td>
                    <td>Matricule</td>
                    <td>Téléphone</td>
                    <td>Promotion</td>
                    <td>Email</td>
                    <td>Certification</td>
                    <td>Age</td>
                    <td>Naissance</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php 
                        foreach($apprenants as $apprenant){
                            ?>
                                <tr>
                                    <td class="profile-name"><div><img src="media/uploads/<?= $apprenant['photo'] ?>" alt="" class="profile"></div><div>&nbsp;<?php echo $apprenant['prenom'].' '.$apprenant['nom']; ?></div></td>
                                    <td><?= $apprenant['matricule'] ?></td>
                                    <td><?= $apprenant['num_tel'] ?></td>
                                    <td><?= $apprenant['titre'] ?></td>
                                    <td><?= $apprenant['email'] ?></td>
                                    <td><?= $apprenant['annee_cert'] ?></td>
                                    <td><?= $apprenant['age'] ?></td>
                                    <td><?= $apprenant['date_naissance'] ?></td>
                                    <td>
                                        <a href="index.php?q=e&lid=<?= $apprenant['id_app'] ?>"><img src="media/icons/edit.png" alt="Modifier"></a>
                                        <a href="./model/delete-learner.php?lid=<?= $apprenant['id_app'] ?>"><img src="media/icons/delete.png" alt="Supprimer"></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>