<?php
$title = "Le Dauphiné";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
$database = connect_to_DB();
session_start();
?>

<?php
// Vérifier si l'utilisateur.ice est connecté(e)
if (isset($_SESSION['username'])) {
    // Inclure le fichier logoutForm.php pour permettre à l'utilisateur de se déconnecter
    include_once('admin/logoutForm.php');
}
?>

<div class="container">

    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<?php 

if(isset($_GET["id"]) === false) {
    header("Location: http://localhost/dauphineexam/examPHP/index.php");
}?>
<?php

$id = $_GET["id"];
$articles = findArticlesbyId ($database, $id);

foreach ($articles as $article) {
?>
<div class="text-center">
    <a href="index.php">Retour à la liste des articles</a>
    <h1> <?php echo($article['titre']); ?></h1>
    <p>Date de publication : Le <?php echo($article['datePublication']); ?></p>
    <img src="<?php echo($article['imageUrl']) ?>" class="img-fluid" alt="image de mon article">
    <p><?php echo($article['contenu']); ?></p>
    <p>Article rédigé par : <?php echo($article['auteur']); ?></p>
</div>
<?php
}
?>
<?php
include_once("block/footer.php");
?>