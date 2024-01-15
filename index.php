<?php
require_once('connect.php');


function displayEmployees($pdo)
{
    try {
        $sql = "SELECT id, nom, prenom, adresse, numero_tel FROM clients";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

$clients = displayEmployees($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="header">
            <h1>Manage Employees</h1>
            <div class="btn">
                <button type="button" onclick="window.location.href='addEmployees.php';">Add</button>
                <!-- Assuming you will handle delete functionality separately -->
                <button type="submit" name="delete">Delete</button>
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
            <?php foreach ($clients as $value): ?>
                <tr>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['nom']; ?></td>
                    <td><?= $value['prenom']; ?></td>
                    <td><?= $value['adresse']; ?></td>
                    <td><?= $value['numero_tel']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</body>
</html>
