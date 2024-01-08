<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('connect.php');

    
    ?>
    <form action="" method="post">
        <div class="header">
            <h1>manage employees</h1>
            <div class="btn">
            <button type="submit"><a href="addEmployees.php">add</a></button>
            <button type="submit">delete</button>
            </div>
            
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Numero de tel.</th>
            </tr>
        </table>
    </form>
</body>
</html>