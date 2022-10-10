<?php require_once '_partials/header.php'; ?>

<!-- Un titre au centre de la page -->
<h1 class="text-center">Modifier un Client</h1>
<!-- Message d'erreur -->
<?php if(isset($error)) : ?>
    <div class="alert alert-danger">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<!-- 
Créer un formulaire avec la méthode POST qui permet de modifier un client.
Le formulaire doit contenir les champs suivants :
    - Nom
    - Prénom
    - Adresse
    - Téléphone
    - Est-it actif ?
-->
<form action="edit.php?id=<?= $id ?>" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?= $client['nom'] ?>" id="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?= $client['prenom'] ?>" id="prenom" class="form-control">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" value="<?= $client['adresse'] ?>" id="adresse" class="form-control">
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" value="<?= $client['telephone'] ?>" id="telephone" class="form-control">
    </div>
    <div class="form-group">
        <label for="actif">Est-il actif ?</label>
        <input type="checkbox" name="actif" id="actif" <?php if($client['actif'] == true): ?> checked <?php endif ?>>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="submit">Modifier</button>
    
</form>

<?php require_once '_partials/footer.php'; ?>