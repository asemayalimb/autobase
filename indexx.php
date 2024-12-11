$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

// index.php
<?php
require_once "pdo.php";

// Initialize session
session_start();

// Handle POST request to add an auto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['make']) && !empty($_POST['year']) && !empty($_POST['mileage'])) {
        $make = htmlentities($_POST['make']);
        $year = htmlentities($_POST['year']);
        $mileage = htmlentities($_POST['mileage']);

        if (is_numeric($year) && is_numeric($mileage)) {
            $stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)");
            $stmt->execute([':make' => $make, ':year' => $year, ':mileage' => $mileage]);
            $_SESSION['success'] = "Record inserted successfully!";
        } else {
            $_SESSION['error'] = "Year and mileage must be numeric.";
        }
    } else {
        $_SESSION['error'] = "All fields are required.";
    }
    header("Location: index.php");
    return;
}

// Handle GET request to display existing autos
$autos = [];
$stmt = $pdo->query("SELECT make, year, mileage FROM autos ORDER BY make");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $autos[] = $row;
}
?>
