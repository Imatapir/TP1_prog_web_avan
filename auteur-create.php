<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteur Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <form action="auteur-store.php" method="post">
            <h2>Nouvel auteur</h2>
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Prenom
                <input type="text" name="prenom">
            </label>
            <input type="submit" class="btn" value="Save"> 
        </form>
    </div>
    
</body>
</html>