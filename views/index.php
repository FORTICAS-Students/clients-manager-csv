<?php require_once '_partials/header.php'; ?>

<!-- Un titre au centre de la page -->
<h1 class="text-center">Liste des clients</h1>
<!-- vérifier si le tableau $clients existe -->
<?php if(!isset($clients) || empty($clients)) : ?>
    <div class="alert alert-info">
        Aucun client n'a été enregistré
    </div>
<?php else : ?>
<!-- 
    Tableau des clients 
    Le tableau doit contenir les en-têtes suivants:
        - Nom
        - Prénom
        - Adresse
        - Téléphone
        - Date d'insertion
        - Est-it actif ? (Oui/Non)
-->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Date d'insertion</th>
            <th>Est-it actif ?</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $key => $client) : ?>
            <tr>
                <td><?= $client[0]; ?></td>
                <td><?= $client[1]; ?></td>
                <td><?= $client[2]; ?></td>
                <td><?= $client[3]; ?></td>
                <td><?= $client[4]; ?></td>
                <td><?php if($client[5] == 1): ?> Oui <?php else: ?> Non <?php endif ?></td>
                <td>
                    <a href="edit.php?id=<?= $key ?>" class="btn btn-warning">Modifier</a>
                    <a href="delete.php?id=<?= $key ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
<!-- un bouton qui permet d'ajouter un client -->
<a href="insert.php" class="btn btn-primary">Ajouter un client</a>

<?php require_once '_partials/footer.php'; ?>