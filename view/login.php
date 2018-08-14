<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="public/jquery.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("templates/navbar.php"); ?>
    <div class="container">
        <form method="post" action="?action=login">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

</body>

</html>
