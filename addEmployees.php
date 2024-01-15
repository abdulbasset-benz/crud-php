<?php
require_once('connect.php');

function addEmployee($nom, $prenom, $adresse, $numTel)
{
    global $pdo; // Access the global connection object

    try {
        if (isset($_POST["add"])) {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $numTel = $_POST["numero_tel"];

            // Your SQL query with placeholders
            $sql = "INSERT INTO clients (nom, prenom, adresse, numero_tel) VALUES (?, ?, ?, ?)";
            
            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters to placeholders
            $stmt->bindParam(1, $nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $adresse, PDO::PARAM_STR);
            $stmt->bindParam(4, $numTel, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();


            // Close the statement (not required in PDO)  
                      
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
    
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addEmployee($_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["numero_tel"]);
    echo"  added";
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
    <h1>Add Employees</h1>
    <form action="" method="post" class="form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse">

        <label for="numero_tel">Numéro de téléphone :</label>
        <input type="tel" id="numero_tel" name="numero_tel" pattern="[0-9]{10}" placeholder="Format: 1234567890">

        <button type="submit" name="add">Ajouter Employé</button>
    </form>
</body>
</html>
