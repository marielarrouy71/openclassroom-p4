<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/style.css" rel="stylesheet">
    <script src="public/jquery.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("templates/navbar.php"); ?>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        titre
                    </th>

                    <th>
                        contenu
                    </th>

                    <th>
                        actions
                    </th>

                </tr>

            </thead>
            <?php foreach($notes as $note){?>
            <tr>
                <td>

                    <?php echo   $note->getTitle();?>

                </td>
                <td>
                    <div class="adminArticleContent">
                        <?php 
                echo $note->getContent();
                ?>
                    </div>
                </td>
                <td>
                    <a href="?action=updateNoteDisplay&noteId=<?php echo $note->getId();?>" class="btn btn-primary">Modifier</a>
                    <a href="?action=deleteNote&noteId=<?php echo $note->getId();?>" class="btn btn-danger"> Supprimer</a>
                    <a href="?action=manageCommentsDisplay&noteId=<?php echo $note->getId();?>" class="btn btn-warning">Gérer les commentaires</a>





                </td>
            </tr>



            <?php    
} ?>



        </table>
        <a href="?action=addNoteDisplay" class="btn btn-primary">Ajouter une note</a>
    </div>

</body>

</html>
