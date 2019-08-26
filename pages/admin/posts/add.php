<?php


use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('POST');

if(!empty($_POST)){
    $result = $postTable->create([
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'category_id' => $_POST['category_id']
     ]);
     if($result){
        header('Location: admin.php');
     }
}

$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
$form = new BootstrapForm($_POST);
?>

<form method="post">

    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Ajouter</button>

</form>
