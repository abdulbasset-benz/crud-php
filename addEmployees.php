<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>add employees</h1>
    <form action="" method="post" class="form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse">

        <label for="numero_tel">Numéro de téléphone :</label>
        <input type="tel" id="numero_tel" name="numero_tel" pattern="[0-9]{10}" placeholder="Format : 1234567890">

        <button type="submit">Ajouter Employé</button>
    </form>
</body>
</html>