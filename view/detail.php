<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Détail</title>
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="public/jquery.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("templates/navbar.php"); ?>
    <div class="container">

        <h1>
            <?php echo $note->getTitle(); ?>
        </h1>

        <div>
            <?php echo $note->getContent(); ?>
        </div>
        <h5>Commentaires</h5>
        <ul>
            <?php foreach($comments as $comment){?>
            <li>
                <?php echo $comment->getContent();?><br/>
                <?php if ($comment->isNotified()){ ?>
                <span> Déjà signalé </span>
                <?php } ?>
                <!-- Condition inverse-->
                <?php if (!$comment->isNotified()){ ?>
                <a href="?action=notifyComment&commentId=<?php echo $comment->getId();?>&noteId=<?php echo $note->getId();?>" class="btn btn-danger">Signaler</a>
                <?php } ?>

            </li>
            <?php } ?>
        </ul>


        <p>Laisser un commentaire</p>

        <div class="container w-50">


            <form action="?action=addComment&noteId=<?php echo $note->getId();?>" method="post">

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="content">Commentaire</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="author">Nom ou pseudo</label>
                    <input type="text" class="form-control" name="author" placeholder="Gustave Flaubert">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>

            </form>

        </div>


    </div>



</body>

</html>
