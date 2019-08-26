<?php


use Core\HTML\BootstrapForm;

$table = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $table->create([
        'titre' => $_POST['titre']
     ]);
     if($result){
        header('Location: admin.php?p=categories.index');
     }
}


$form = new BootstrapForm($_POST);
?>

<form method="post">

    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Ajouter</button>

</form>
