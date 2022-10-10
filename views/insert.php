<?php require_once '_partials/header.php'; ?>

<!-- Un titre au centre de la page -->
<h1 class="text-center">Ajouter un Client</h1>
<!-- Message d'erreur -->
<?php if(isset($error)) : ?>
    <div class="alert alert-danger">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<!-- 
Créer un formulaire avec la méthode POST qui permet d'ajouter un client.
Le formulaire doit contenir les champs suivants :
    - Nom
    - Prénom
    - Adresse
    - Téléphone
    - Est-it actif ?
-->
<form action="insert.php" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'] ?>" id="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'] ?>" id="prenom" class="form-control">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse'] ?>" id="adresse" class="form-control">
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'] ?>" id="telephone" class="form-control">
    </div>
    <div class="form-group">
        <label for="actif">Est-il actif ?</label>
        <input type="checkbox" name="actif" id="actif" <?php if(isset($_POST['actif'])): ?> checked <?php endif ?>>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="only-submit">Valider et ajouter un autre client</button>
    <button type="submit" class="btn btn-primary mt-3" name="submit-return-index">Ajouter et revenir à l'accueil</button>
</form>

<?php require_once '_partials/footer.php'; ?>