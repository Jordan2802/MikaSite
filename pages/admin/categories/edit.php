<?php


use Core\HTML\BootstrapForm;

$table = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $table->update($_GET['id'], [
        'titre' => $_POST['titre']
     ]);

     if($result){

        ?>
            <div class="alert alert-success">La catégorie a bien été modifiée</div>
        <?php
     }
}


$categorie = $table->find($_GET['id']);
$form = new BootstrapForm($categorie);
?>

<form method="post">

    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>
