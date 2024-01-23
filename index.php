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

function deleteEmployees($pdo, $ids)
{
    if (isset($_POST["delete"]) && isset($_POST["check"])) {
        try {
            // Utilisez la fonction implode pour créer une chaîne de valeurs séparées par des virgules
            $idsString = implode(',', $ids);

            // Requête pour supprimer les enregistrements avec des IDs spécifiés
            $sql = "DELETE FROM clients WHERE id IN ($idsString)";
            $stmt = $pdo->prepare($sql);

            // Pas besoin de bindParam ici, car les valeurs sont directement dans la requête

            $stmt->execute();

            echo "Records deleted successfully!";
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["delete"]) && isset($_POST["check"])) {
        // Récupérez les IDs cochées
        $checkedIds = $_POST["check"];

        // Vérifiez si au moins une case à cocher est cochée
        if (!empty($checkedIds)) {
            // Appelez la fonction de suppression avec les IDs
            deleteEmployees($pdo, $checkedIds);
            // Rechargez les employés après la suppression pour afficher la mise à jour
            $clients = displayEmployees($pdo);
        } else {
            echo "Veuillez sélectionner au moins un employé à supprimer.";
        }
    }
}

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
    <div class="container">
        <div class="logo"><a href="index.php"><img src="img/logo.png" alt=""></a></div>
        <div class="list-items">
            <ul>
                <li><a href="index.php">home page</a></li>
                <li><a href="addEmployees.php">manage employees</a></li>
            </ul>
        </div>
    </div>
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
                <th>deletion</th>
            </tr>
            <?php foreach ($clients as $value): ?>
                <tr>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['nom']; ?></td>
                    <td><?= $value['prenom']; ?></td>
                    <td><?= $value['adresse']; ?></td>
                    <td><?= $value['numero_tel']; ?></td>
                    <td><input type="checkbox" name="check[]" value="<?php echo $value['id']?>" ></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</body>
</html>
